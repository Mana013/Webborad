<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "webboard";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}
?>