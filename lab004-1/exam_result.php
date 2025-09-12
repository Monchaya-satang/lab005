<?php
require("connect_db.php");
$sql="SELECT * FROM courses";
$result=mysqli_query($conn, $sql);
?>
<html>
<head><title>Exam Result</title></head>
<body>
Select Course to show
<form action=show_exam_result.php method="get">
<select name="course_code">
<?php
while($row=mysqli_fetch_assoc($result)){
?>
<option value="<?php echo $row["course_code"];?>">
<?php echo $row["course_code"];?> <?php echo $row["course_name"];?>
</option>
<?php
}
?>
</select>
<input type="submit" value="Show">
</form>
</body>
</html>