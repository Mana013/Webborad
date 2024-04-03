<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <h1 style="text-align: center;" class="mt-3">Web Board Mana</h1>
    <?php 
        session_start();
        if(!isset($_SESSION['id'])&& $_SESSION["role"]=='a') {
            header("Location:index.php");
            die();
        }
        include "nav.php";       
        ?>
        <div class="row mt-4">
    <div class="col-lg-3 col-md-2 col-sm-1 "></div>
        <div class="col-lg-6 col-md-8 col-sm-10 ">
            <?php 
            if(isset($_SESSION['catedit'])){
                if($_SESSION['catedit']=="success"){
                    echo"<div class='alert alert-success'>แก้ไขหมวดหมู่สำเร็จ</div>";
                }
                unset($_SESSION['catedit']);
            }
            if(isset($_SESSION['catadd'])){
                if($_SESSION['catadd']=="success"){
                    echo"<div class='alert alert-success'>เพิ่มหมวดหมู่สำเร็จ</div>";
                }
                unset($_SESSION['catadd']);
            }
            if(isset($_SESSION['catdelete'])){
                if($_SESSION['catdelete']=="success"){
                    echo"<div class='alert alert-success'>ลบหมวดหมู่สำเร็จ</div>";
                }
                unset($_SESSION['catdelete']);
            }
            ?>
        <table class="table table-striped mt-4">
        <?php
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root",""); 
        $sql="SELECT * FROM category";
        $result=$conn->query($sql);
        echo"<tr><td class='col-3 fw-bold'>ลำดับ</td><td class='col-6 fw-bold'>ชื่อหมวดหมู่</td><td class='col-3 fw-bold'>จัดการ</td></tr>";
        while($row = $result->fetch()){
            echo"<tr><td class=col-4>$row[0]</td><td class=col-4>$row[1]</td><td class=col-4><a href='category_edit.php?edit=$row[0]' name='edit' class='btn btn-warning bi bi-pencil-fill'></a>
            <a href='category_delete.php?del=$row[0]' name='del' onclick='return myConfirm()' class='btn btn-danger bi bi-trash'></a></td></tr>";    
        }
        ?>
        </table>
        <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-success bi bi-journal-plus" data-bs-toggle="modal" data-bs-target="#Modal">เพิ่มหมวดหมู่</button>
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">เพิ่มหมวดหมู่</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="category_new.php" method="post">
      <div class=" mt-1">
                <label for="name" class="col-lg-3 col-form-label">ชื่อหมวดหมู่ใหม่</label>                                                                         
                        <input type="text" name="name" id="name" class="form-control" require>                                                                                             
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
        </div>   
    </div>
</div>

<script>
        function myConfirm(){
            txt = confirm('ต้องการลบหมวดหมู่นี้ใช่หรือไม่');
            if(txt){
                document.location.href=`category_delete.php?del=$row[0]`;
                return true;
            }
            else {
                return false;
            }
        }
   
         
    </script>
</body>
</html>