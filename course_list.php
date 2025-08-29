<?php
require("connect_db.php");
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
echo "<center>";
echo "<table border=1 width=40%>";
echo "<tr><th>Course Code</th><th>Course Name</th><th>Credit</th><th>Operationt</th></tr>";
while($row = mysqli_fetch_assoc($result)){
echo
"<tr><td>".$row["course_code"]."</td><td>".$row["course_name"]."</td><td>".$row["credit"]."</t
d>";
echo "<td><a href=edit_course.php?course_code=".$row["course_code"].">Edit</a> <a href=delete_course.php?course_code=".$row["course_code"]." onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td></tr>";
}
echo "</table>";
echo "<br><a href=add_course.php>Add Course</a>";
echo "</center>";
?>