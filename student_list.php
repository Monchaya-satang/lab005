<?php
require("connect_db.php");
$sql = "SELECT student_code, student_name, gender FROM students";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<center>";
    echo "<table border=1>";
    echo "<tr><th>Code</th><th>Name</th><th>Gender</th><th>Operation</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["student_code"] . "</td><td>" . $row["student_name"] . "</td><td>" .
            $row["gender"] . "</td><td><a href=edit_student.php?student_code=".
            $row["student_code"].">Edit</a> <a href=delete_student.php?student_code=".$row["student_code"]." onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "<br><a href=add_student.php>Add Student</a>";
echo "</center>";