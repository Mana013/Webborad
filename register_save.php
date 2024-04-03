<?php  
    session_start(); 
    if(isset($_POST['login'])){
    $login = $_POST['login'];
    $pwd1 = sha1($_POST['pass1']);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="SELECT * FROM user where login='$login'";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
        $_SESSION['add_login']="error";
    }
    else if($_POST['pass1']!=$_POST['pass2']){
        $_SESSION['add_login']="error2";
    }
    else{      
    $sql =  "INSERT INTO user(login,password,name,gender,email,role) VALUES('$login','$pwd1','$name','$gender','$email','m')";
    $conn->exec($sql);
    $_SESSION['add_login']="success";
        header("Location:register.php");
        die();
    }   
}
    $conn=null;
    header("Location:register.php");
        die();  
    
?>
    