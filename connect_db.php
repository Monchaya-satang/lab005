<?php
$servername = "localhost";
$username = "Monchaya";
$password = "ai160345";
$db = "monchaya";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
<?php
$url = "student_list.php";
$linkText = "Students";
echo "<a href=\"$url\">$linkText</a><br>";
?>
<?php
$url = "course_list.php";
$linkText = "Couress";
echo "<a href=\"$url\">$linkText</a><br>";
?>
<?php
$url = "show_exam_result.php";
$linkText = "Exam Result";
echo "<a href=\"$url\">$linkText</a><br>";
?>
