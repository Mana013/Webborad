<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php session_start();  ?>
<h1 style="text-align: center;">Web ManaBoard</h1>
    <hr>
   <?php 
   $id = $_POST['login'];
   $pw = $_POST['password'];
   ?>
   <div style="text-align: center;" > <?php  
   if($id=='admin'&&$pw=='ad1234'){
    $_SESSION["username"] = $id;
    $_SESSION["role"] = 'a';
    $_SESSION["id"] = session_id();
    header("location : index.php");
    die();
   }
   else if($id=='member'&&$pw=='mem1234'){
    $_SESSION["username"] = $id;
    $_SESSION["role"] = 'm';
    $_SESSION["id"] = session_id();
    header("location : index.php");
    die();
   }
   else {
   $_SESSION["error"] = 'error';
   header("location: login.php");
   die();
   }
   ?>
</body>
</html>
