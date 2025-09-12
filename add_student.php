<?php
require("connect_db.php");
echo "<center>";
echo "<form action=save_add_studen.php method=post>";
echo "<table border=1 width=40%>";
echo "<tr><td>Student Code:</td><td><input type=text name=student_code /></td></tr>";
echo "<tr><td>Student Name:</td><td><input type=text name=student_name /></td></tr>";
echo "<tr><td>Gender:</td><td><input type=text name=gender /></td></tr>";
echo "<tr><td colspan=2><center><input type=submit value=Submit /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>