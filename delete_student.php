<?php
require("connect_db.php");
$student_code = $_GET["student_code"];

$sql ="DELETE FROM students WHERE student_code='$student_code'";
mysqli_query($conn, $sql);
header("location: student_list.php");
exit(0);
?>