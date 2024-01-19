<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
</head>
<body>
    <h1 style="text-align: center;">WebBoard Mana</h1>
    <hr>
    <form action="post.php" method="get">
    หมวดหมู่: <select name="category">
        <option value="all">--ทั้งหมด--</option>></option>
        <option value="general">--เรื่องทั่วไป--</option>></option>
        <option value="study">--เรื่องเรียน--</option>></option>
    </select>
    
    <ul>
        <?php 
        if(!isset($_SESSION["id"])){
            <a href="login.php" target="_blank" style="float: right;">เข้าสู่ระบบ</a>
        }
        else{
            eco"<div style='float right;'>
            ผู้ใช้งานระบบ : $_SESSION[username]&nbsp;&nbsp;
            <a href="logout.php" >ออกจากระบบ</a>
            </div>";
        }
        for($p=1;$p<=10;$p++){
        echo "<li><a href=post.php?id=$p target='_blank' >กระทู้ที่ $p  </a></li>"; 
}
    ?>
           
      </ul>   
    </form>
</body>
<?php
    } else{
?>
    <body>
    <h1><center>WebBoard Mana</h1><br>
    <hr>
    <form action="post.php" method="get">
    หมวดหมู่:
    <select name= "category">
    <option value="all">--ทั้งหมด--</option>
    <option value="general">--เรื่องทั่วไป--</option>
    <option value="study">--เรื่องเรียน--</option>
    </select>
    <div style="float:right">
        <?php
            echo "ผู้ใช้งานระบบ : $_SESSION[username]";
        ?>&nbsp;&nbsp;
        <a href="logout.php" >ออกจากระบบ</a>
    </div><br>
    <a href="newpost.php">สร้างกระทู้ใหม่</a>
    <br>
    <ul>
    
    <?php 
       
        for($i=1;$i<=10;$i++){
            echo "<li>";
            echo "<a href=post.php?id="."$i".">กระทู้ที่ ".$i."</a>";
            if($_SESSION['role'] == "a"){
                echo "&nbsp&nbsp<a href = delete.php?id=$i>ลบ</a>";
            }
            echo "</li>";
        }
    ?>   
      
    </ul>
    </form>
</body>
<?php
    }

    ?>
</html>