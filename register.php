<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php session_start();  ?>
<div class="container">
<h1 style="text-align: center;" class="mt-3">Web ManaBoard</h1>
<?php
   include "nav.php";
   ?>
<div class="row mt-4">
<div class="col-lg-3 col-md-2 col-sm-1 "></div>
<div class="col-lg-6 col-md-8 col-sm-10 ">
<?php
                   if(isset($_SESSION['add_login'])){
                       if($_SESSION['add_login']=="error"){
                           echo "<script>alert('ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา');</script>";
                       }
                       else{
                           echo "<script>alert('เพิ่มบัญชีเรียบร้อยแล้ว');</script>";
                       }
                       unset($_SESSION['add_login']);
                   }
               ?>
            <div class="card border-primary">
            <div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <form action="register_save.php" method="POST" >
                        <div class="row">
                            <label for="user" class="col-form-label col-lg-3">ชื่อบัญชี:</label>
                        <div class="col-lg-9">
                            <input type="text"  name="login" class="form-control" placeholder="Username" required>
                    </div>
                </div>
                    <div class="row mt-3">
                        <label for="pass" class="col-form-label col-lg-3">รหัสผ่าน:</label>
                    <div class="col-lg-9">
                        <input type="password"  class="form-control"name="pass" placeholder="Password" required>
                    </div>
                </div>
                    <div class="row mt-3">
                        <label for="pass_confirm" class="col-form-label col-lg-3">ยืนยันรหัสผ่าน:</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" name="pass_confirm" placeholder="Confirm Password" required>
                    </div>
                </div>

                    <div class="row mt-3">
                        <label for="name" class="col-form-label col-lg-3">ชื่อ-นามสกุล:</label>
                    <div class="col-lg-9">
                        <input type="text"  name="name" class="form-control" placeholder="Firstname-Lastname" required>
                    </div>
                </div>  
                    <div class="row mt-3">
                        <label class="col-lg-3 form-label ">เพศ</label>
                    <div class="col-lg-9">
                    <div class="form-check">  
                        <input class="form-check-input" type="radio" name="gender" value="M" require>
                        <label label class="form-check-label" for="M"> ชาย </label>
                    </div>
                    <div class="form-check">        
                        <input class="form-check-input" type="radio" name="gender" value="M" require>
                        <label class="form-check-label" for="F"> หญิง </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="M" require>
                        <label class="form-check-label" for="O"> อื่นๆ </label>
                    </div>
                </div>
            </div>
                    <div class="row mt-3">
                        <label  class="col-form-label col-lg-3">อีเมล:</label>
                    <div class="col-lg-9">
                        <input type="email"  name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-center mt-3 co-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm me-2"><i class="bi bi-save"></i>สมัครสมาชิก</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i>ยกเลิก</button>
                        </div>  
                    </div>
                </form>
            </div>      
        </div>
    </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div style="text-align: center;">
        <a href="index.php">กลับไปที่หน้าหลัก</a>
        </div>
    </div>
</div>
</body>
</html>