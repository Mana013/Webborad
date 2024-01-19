<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center;">Web ManaBoard</h1>
    <hr>
   <?php 
   $user = $_POST['login'];
   $pass = $_POST['password'];
   ?>

   <div style="text-align: center;" > <?php  
   if($user=='admin'&&$pass=='ad1234'){
    echo "ยินดีต้อนรับคุณ admin" .'<BR>';
            $_SESSION["username"] = "admin";
            $_SESSION["role"] = "a";
            $_SESSION["id"] = session_id();
   }
   else if($user=='member'&&$pass=='m1234'){
   echo "ยินดีต้อนรับคุณ member" .'<BR>';
            $_SESSION["username"] = "member";
            $_SESSION["role"] = "m";
            $_SESSION["id"] = session_id();
   }
   else if ($user == 'Mana' && $pass == '1234') {
    echo "ยินดีต้อนรับคุณ Mana";
}
   else echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง".'<BR>';
   ?> </div>
   <div style="text-align: center;"> 
        <a href="index.php">กลับไปที่หน้าหลัก</a>
    </div>
</body>
</html>
