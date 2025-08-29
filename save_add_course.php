<?php
require("connect_db.php");
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$credit = $_POST["credit"];
$sql ="INSERT INTO courses(course_code, course_name, credit) VALUES('$course_code',
'$course_name', $credit)";
mysqli_query($conn, $sql);
header("location: course_list.php");
exit(0);
?>