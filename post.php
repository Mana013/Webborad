<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center;">Web Ja Board</h1>
    <hr>
    <div style="text-align: center;">
    <?php
    $id = ($_GET["id"]);
    echo "ต้องการดูกระทู้หมายเลข $id";
    ?>  
    </div>
    <div style="text-align: center;">
    <?php
    $i= $id%2 ;
    if($i==1){
    echo "เป็นกระทู้หมายเลขคี่";
}
    else{
    echo "เป็นกระทู้หมายเลขคู่";
}
    ?>  
    </div>
    <table style="border: 2px solid black; width: 40%;" align="center"> 
        <tr style="text-align: center;"><td style="background-color: #6cd2fe;" colspan="2" >แสดงความคิดเห็น</td></tr>
        <tr style="text-align: center;"><td><textarea name="" id="" cols="30" rows="10"></textarea></td></tr>
        <tr style="text-align: center;"><td colspan="2"><input type="submit" value="ส่งข้อความ"></form></td></tr>
    </table>
    <div style="text-align: center;"> 
        <a href="index.php">กลับไปที่หน้าหลัก</a>
    </div>
   
</body>
</html>