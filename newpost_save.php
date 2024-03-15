<?php 
    session_start();
    if(isset($_POST['topic']) && isset($_SESSION['id'])){
        $cat = $_POST['category'];
        $topic = $_POST['topic'];
        $comment = $_POST['comment'];
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql =  "INSERT INTO post(title,content,post_date,cat_id,user_id) VALUES('$topic','$comment',NOW(),'$cat','$_SESSION[user_id]')";
        $conn->exec($sql);
        header("Location:index.php");
        die();
    }
    else {
    header("Location:login.php");
    die();
    }

?>