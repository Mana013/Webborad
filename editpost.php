<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
    <h1 style="text-align: center;" class="mt-3">Web Board Mana</h1>
    <?php 
        session_start();
            if(!isset($_SESSION['id'])) {
                header("Location:index.php");
                die();
        }
            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
             $sql="SELECT * FROM category where post.id=$_GET[edit]";
        if($_SESSION["user_id"]!=$_GET['user']){
            header("Location:index.php");
            die();
        }
        include "nav.php";
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql="SELECT post.cat_id,category.name,post.title,post.content FROM post  
        INNER JOIN user ON (post.user_id=user.id ) 
        INNER JOIN category ON (post.cat_id=category.id ) WHERE post.id=$_GET[edit] ";  
        unset($_SESSION['post']);
        $_SESSION["post"] = $_GET['edit'];
    ?>
    <div class="row mt-4">
    <div class="col-lg-3 col-md-2 col-sm-1 "></div>
        <div class="col-lg-6 col-md-8 col-sm-10 ">
        <?php 
                    if(isset($_SESSION['edit'])){
                        if($_SESSION['edit']=="success"){
                            echo"<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['edit']);
                    }
                    ?>
            <div class="card border-warning">
            <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
            <div class="card-body">
                <form action="editpost_save.php" method="post">
                    <div class="row">
                    <label class="col-lg-3 col-form-label" >หมวดหมู่</label>
                    
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                            <?php                             
                            foreach($conn->query($sql)as $row){
                                echo "<option value=$row[0]>$row[1]</option>";
                            }                                                                        
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                            <label class="col-lg-3 col-form-label">หัวข้อ</label>
                            <div class="col-lg-9">
                            <?php                           
                             foreach($conn->query($sql)as $row){
                                 echo "<input type=text name=topic class=form-control value=$row[2] require> ";
                             }                            
                             ?>
                            </div>
                    </div>
                    <div class="row mt-3">
                            <label class="col-lg-3 col-form-label">เนื้อหา</label>
                            <div class="col-lg-9">
                            <?php
                             foreach($conn->query($sql)as $row){
                                 echo "<textarea name=content rows=8 class=form-control require>$row[3]</textarea>";
                             }                            
                             ?>                              
                            </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-9 d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning btn-sm text-white me-2">
                                <i class="bi bi-caret-right-square "></i>บันทึกข้อความ</button>                               
                            </div>                       
                 </div>
                 </form>
            </div>
        </div>   
    </div>
</body>
</html>