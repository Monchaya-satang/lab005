<?php
require("connect_db.php");
$student_code = $_GET["student_code"];
$sql = "SELECT * FROM students WHERE student_code='$student_code'";
$result = mysqli_query($conn, $sql);
$course = mysqli_fetch_assoc($result);echo "<center>";
echo "<form action=save_course.php method=post>";
echo "<table border=1 width=40%>";
echo "<input type=hidden name=course_code_edit value=$course_code />";
echo "<tr><td>Course Code:</td><td><input type=text name=course_code value=".$course["course_code"]."
/></td></tr>";
echo "<tr><td>Course Name:</td><td><input type=text name=course_name value=".$course["course_name"]."
/></td></tr>";
echo "<tr><td>Credit:</td><td><input type=text name=credit value=".$course["credit"]." /></td></tr>";
echo "<tr><td colspan=2><center><input type=submit value=Submit /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>