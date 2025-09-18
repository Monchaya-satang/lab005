<?php
require("connect_db.php");
$sql = "
    SELECT exam_result.course_code, exam_result.student_code, students.student_name, exam_result.exam_point
    FROM exam_result
    LEFT JOIN students ON exam_result.student_code = students.student_code

    UNION

    SELECT exam_result.course_code, exam_result.student_code, students.student_name, exam_result.exam_point
    FROM students
    LEFT JOIN exam_result ON exam_result.student_code = students.student_code
";

$result = mysqli_query($conn, $sql);

echo "<center>";
echo "<table border=1 width=40%>";
echo "<tr><th>Course Code</th><th>Student Code</th><th>Student Name</th><th>Exam Point</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['course_code']}</td>
        <td>{$row['student_code']}</td>
        <td>{$row['student_name']}</td>
        <td>{$row['exam_point']}</td>
    </tr>";
}

echo "</table>";  // แก้จาก <teble>
echo "</center>";
?>
