<?php
require("connect_db.php");

// 1. เลือก course_code
$course_code = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_code = $_POST['course_code'];
} elseif (isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];
}

// 2. ดึงรายวิชาทั้งหมด
$course_options = "";
$course_query = "SELECT * FROM courses ORDER BY course_code ASC";
$course_result = mysqli_query($conn, $course_query);
while ($course = mysqli_fetch_assoc($course_result)) {
    $selected = ($course_code == $course['course_code']) ? "selected" : "";
    $course_options .= "<option value='{$course['course_code']}' $selected>
                            {$course['course_code']} - {$course['course_name']}
                        </option>";
}

// 3. ดึงนักเรียนทั้งหมด
$students = [];
$student_query = "SELECT * FROM students ORDER BY student_code ASC";
$student_result = mysqli_query($conn, $student_query);
while ($student = mysqli_fetch_assoc($student_result)) {
    $students[] = $student;
}

// 4. ดึงคะแนนที่มีอยู่แล้วในวิชานี้
$exam_scores = [];
if (!empty($course_code)) {
    $score_query = "SELECT * FROM exam_result WHERE course_code = '$course_code'";
    $score_result = mysqli_query($conn, $score_query);
    while ($score = mysqli_fetch_assoc($score_result)) {
        $exam_scores[$score['student_code']] = $score['exam_point'];
    }
}
?>

<!-- FORM เลือกวิชา -->
<form method="POST">
    <label>เลือกวิชา:</label>
    <select name="course_code" onchange="this.form.submit()" required>
        <option value="">-- เลือกรายวิชา --</option>
        <?php echo $course_options; ?>
    </select>
</form>

<?php if (!empty($course_code)): ?>
    <hr>
    <h3>กรอกคะแนนวิชา: <?php echo $course_code; ?></h3>
    <form method="POST">
        <input type="hidden" name="course_code" value="<?php echo $course_code; ?>">
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Student Code</th>
                <th>Student Name</th>
                <th>Exam Point</th>
            </tr>
            <?php foreach ($students as $student): 
                $code = $student['student_code'];
                $name = $student['student_name'];
                $point = isset($exam_scores[$code]) ? $exam_scores[$code] : '';
            ?>
            <tr>
                <td><?php echo $code; ?></td>
                <td><?php echo $name; ?></td>
                <td>
                    <input type="text" name="exam_point[<?php echo $code; ?>]" 
                           value="<?php echo htmlspecialchars($point); ?>" size="5">
                </td>
            </tr>
            <?php endforeach; ?>
        </table><br>
        <input type="submit" name="save_scores" value="บันทึกคะแนนทั้งหมด">
    </form>
<?php endif; ?>

<?php
// ✅ บันทึกคะแนน
if (isset($_POST['save_scores'])) {
    $course_code = $_POST['course_code'];
    $exam_point_array = $_POST['exam_point'];

    foreach ($exam_point_array as $student_code => $point) {
        $point = trim($point);

        if ($point === "") {
            // ลบข้อมูลคะแนน ถ้าค่าว่าง
            $delete_sql = "DELETE FROM exam_result 
                           WHERE student_code = '$student_code' AND course_code = '$course_code'";
            mysqli_query($conn, $delete_sql);
        } else {
            // ตรวจสอบว่ามีข้อมูลอยู่แล้วหรือไม่
            $check_sql = "SELECT * FROM exam_result 
                          WHERE student_code = '$student_code' AND course_code = '$course_code'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) > 0) {
                // UPDATE คะแนน
                $update_sql = "UPDATE exam_result SET exam_point = '$point' 
                               WHERE student_code = '$student_code' AND course_code = '$course_code'";
                mysqli_query($conn, $update_sql);
            } else {
                // INSERT คะแนนใหม่
                $insert_sql = "INSERT INTO exam_result (student_code, course_code, exam_point) 
                               VALUES ('$student_code', '$course_code', '$point')";
                mysqli_query($conn, $insert_sql);
            }
        }
    }

    // ✅ เปลี่ยนกลับไปที่ show_exam_result.php หลังบันทึก
    header("Location: show_exam_result.php");
    exit();
}
?>
