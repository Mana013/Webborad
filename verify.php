<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php session_start(); 
    if(isset($_SESSION['id'])){
        header("Location:index.php");
        die();
    }
   $id = $_POST['login'];
   $pwd = $_POST['pass'];
   $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
   $sql="SELECT * FROM user where login='$id'and password=sha1('$pwd')";
   $result=$conn->query($sql);
   if($result->rowCount()==1){
    $data=$result->fetch(PDO::FETCH_ASSOC);
    $_SESSION["username"] = $data['login'];
    $_SESSION["role"] = $data['role'];
    $_SESSION["user_id"] = $data['id'];
    $_SESSION["id"] = session_id();
    header("Location:index.php");
    die();
   }
   else {
   $_SESSION["error"] = 'error';
   header("Location:login.php");
   die();
   }
   $conn=null;
   ?>
</body>
</html>
