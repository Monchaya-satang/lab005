<?php
require("connect_db.php");
$student_code = $_GET["student_code"];
$sql = "SELECT * FROM students WHERE student_code='$student_code'";
$result = mysqli_query($conn, $sql);
$course = mysqli_fetch_assoc($result);echo "<center>";
echo "<form action=save_student.php method=post>";
echo "<table border=1 width=40%>";
echo "<input type=hidden name=student_code_edit value=$student_code />";
echo "<tr><td>Student Code:</td><td><input type=text name=student_code value=".$student["student_code"]."
/></td></tr>";
echo "<tr><td>Student Name:</td><td><input type=text name=course_name value=".$student["student_name"]."
/></td></tr>";
echo "<tr><td>Gender:</td><td><input type=text name=gender value=".$gender["gender"]." /></td></tr>";
echo "<tr><td colspan=2><center><input type=submit value=Submit /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>