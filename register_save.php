<?php
session_start();
if(isset($_POST['login'])){
   $login = $_POST['login'];
   $pwd = sha1($_POST['pass']);
   $name = $_POST['name'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
   $sql="SELECT * FROM user where login='$login'";
   $result=$conn->query($sql);
   if($result->rowCount()==1){
       $_SESSION['add_login']="error";
       echo '<script>window.alert("รหัสผู้ใช้นี้ถูกใช้ไปแล้ว โปรดกรอกรหัสผู้ใช้อื่น");</script>';
       header("Location: register.php");
       exit();
   }
   else{      
       $sql =  "INSERT INTO user(login,password,name,gender,email,role) VALUES('$login','$pwd','$name','$gender','$email','m')";
       $conn->exec($sql);
       $_SESSION['add_login']="success";
       header("Location: register.php");
       exit();
   }
}
else{
   header("Location: register.php");
   exit();
}
$conn=null;
?>