<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category_edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <h1 style="text-align: center;" class="mt-3">Web Board Mana</h1>
    <?php
    session_start(); 
    if(isset($_SESSION['id']) && $_SESSION['role']!='a') {
        header("Location:index.php");
    }
    include "nav.php";
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="SELECT * FROM category where id=$_GET[edit]";
    unset($_SESSION['catid']);
    $_SESSION["catid"] = $_GET['edit'];
    ?>
    <div class="row mt-4">
    <div class="col-lg-3 col-md-2 col-sm-1 "></div>
        <div class="col-lg-6 col-md-8 col-sm-10 ">
            <div class="card border-warning">
            <div class="card-header bg-warning text-white">ตั้งกระทู้ใหม่</div>
            <div class="card-body">
                <form action="category_save.php" method="post">
                    <div class="row">               
                    <div class="row mt-3">
                            <label class="col-lg-3 col-form-label">หมวดหมู่</label>
                            <div class="col-lg-9">
                            <?php
                            foreach($conn->query($sql)as $row){
                                echo"<input type=text name=name class=form-control value=$row[1]>";
                            }
                                ?>
                            </div>
                    </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-lg-9 d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning btn-sm text-white me-2">
                                <i class="bi bi-caret-right-square "></i>บันทึกหมวดหมู่</button>                               
                            </div>                       
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>