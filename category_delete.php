<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
if(isset($_SESSION['id']) && $_SESSION['role']=='a') {
    $del = $_GET["del"];
    $sql = "DELETE FROM category WHERE id='$del' ";
    $query = $conn->query($sql);
    if($query){
        $_SESSION['catdelete']="success";
    }
    header("Location:category.php");
} 
else 
header("Location:index.php");
    ?> 