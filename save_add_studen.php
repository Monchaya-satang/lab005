<?php
require("connect_db.php");
$student_code = $_POST["student_code"];
$student_name = $_POST["student_name"];
$gender = $_POST["gender"];
$sql ="INSERT INTO students(student_code, student_name, gender) VALUES('$student_code',
'$student_name', '$gender')";
mysqli_query($conn, $sql);
header("location:student_list.php");
exit(0);
?>