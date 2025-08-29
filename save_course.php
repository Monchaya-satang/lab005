<?php
require("connect_db.php");
$course_code_edit = $_POST["course_code_edit"];
$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$credit = $_POST["credit"];
$sql ="UPDATE courses SET course_code='$course_code', course_name='$course_name',
credit=$credit WHERE course_code='$course_code_edit'";
mysqli_query($conn, $sql);
header("location: course_list.php");
exit(0);
?>