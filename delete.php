<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
if(isset($_SESSION['id']) && $_SESSION['role']=='a') {
    $del = $_GET["del"];
    $sql = "DELETE FROM post WHERE id='$del' ";
    $query = $conn->query($sql);
    $sql = "DELETE FROM comment WHERE post_id='$del' ";
    $query = $conn->query($sql);
    if($query){
    echo "<script> alert('ลบกระทู้สำเร็จ')
    window.location.href='index.php'
    </script>";
    }
    else{
        echo "<script> alert('ลบกระทู้ไม่สำเร็จ')
    window.location.href='index.php'
    </script>";
    }
}
else 
header("Location: index.php");
    ?> 