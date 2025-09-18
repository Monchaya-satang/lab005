<?php
require("connect_db.php");

if (isset($_GET['student_code'])) {
    $student_code = $_GET['student_code'];
    
    // ลบข้อมูลจากทั้ง 2 ตารางที่เกี่ยวข้อง
    $delete_sql = "DELETE FROM exam_result WHERE student_code = '$student_code'";
    mysqli_query($conn, $delete_sql);
    
    // หรือถ้าจะลบข้อมูลจาก students ด้วย (ถ้าไม่มีการใช้งาน student_code อื่น ๆ)
    // $delete_student_sql = "DELETE FROM students WHERE student_code = '$student_code'";
    // mysqli_query($conn, $delete_student_sql);
    
    header("Location: show_exam_result.php"); // กลับไปหน้าผลลัพธ์
}
?>
