<?php  
    session_start();
    $name = $_POST['name'];
    $id = $_SESSION['catid'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="UPDATE category SET name='$name' WHERE id=$id;";
    $conn->query($sql);
    $conn=null;       
    $_SESSION['catedit']="success";
    header("Location:category.php");
    die();                   
?>