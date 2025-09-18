<?php
require("connect_db.php");
$sql = "SELECT id, course_code, student_code, exam_point FROM exam_result";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<center>";
    echo "<table border=1>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td><td>" . $row["course_code"] . "</td><td>" .$row["student_code"] . "</td><td>".$row["exam_point"]."</td><td><a href=edit_exam_result.php?student_code=".$row["student_code"].">Edit</a> <a href=delete_exam_result.php.php?student_code=".$row["student_code"]." onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "<br><a href=add_exam_result.php>Add exam point</a>";
echo "</center>";