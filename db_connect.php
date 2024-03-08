<?php
$servername = "localhost";
$username = "root";
$password = ""; // รหัสผ่านของคุณ
$dbname = "webboard";
// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);
// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
   die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}
?>