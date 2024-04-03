<?php  
    session_start();
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    $id = $_SESSION['post'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="UPDATE post SET title='$topic',content='$content' WHERE id=$id;";
    $conn->query($sql);
    $conn=null;       
    $_SESSION['edit']="success";
    header("Location:editpost.php?edit=$id&&user=$_SESSION[user_id]");
    die();                   
?>