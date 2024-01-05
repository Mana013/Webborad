<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center;">Webboard Mana</h1>
    <hr>
    <h2>ต้องการดูกระทู้หมายเลข <?php echo $_GET["id"]; ?><br></h2>
    <table style="border: 2px solid black; width: 40%" align="center">
        <tr style="text-align: center;"><td style="background-color: #6CD2FE;">แสดงความคิดเห็น</td></tr>
        <tr style="text-align: center;"><td><textarea name="comment" cols="60" rows="8"></textarea></td></tr>
        <tr style="text-align: center;"><td><input type="submit" value="ส่งข้อความ"/></td></tr>
        </table> 
        </div><br>
    <div align ="center"><a href="index.html">กลับไปหน้าหลัก</a></div>
</body>
</html>