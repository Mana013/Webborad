<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1 align="center">Web ManaBoard</h1>
    <hr>
    <br>
    <?php
        echo "ผู้ใช้ : $_SESSION[username]";
    ?><br>
    <table >
    <tr><td>หมวดหมู่:</td><td><select name= "menu">
    <option value="general">เรื่องทั่วไป</option>
    <option value="study">เรื่องเรียน</option>
    </select></td></tr>
    <tr><td>หัวข้อ:</td><td><input type="text" name="name" size="20"></td></tr>
    <tr><td>เนื้อหา:</td><td><textarea name="comment" id="" cols="21" rows="3"></textarea></td></tr> 
    <tr><td>    </td><td><input type="submit" value="บันทึกข้อความ"/></td></tr>
    </table>
    <div align ="center"><a href=</a></div>
</body>
</html>