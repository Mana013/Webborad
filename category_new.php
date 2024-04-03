<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['role']!='a') {
    header("Location:index.php");
}
$new = $_POST['name'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql="SELECT * FROM category where name='$new'";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
        $_SESSION['catadd']="error";

    }
    else{
    $sql="INSERT INTO category(name) VALUES('$new')";
    $conn->exec($sql);
    $conn=null;       
    $_SESSION['catadd']="success";
    }
header("Location:category.php");
die();  
?>