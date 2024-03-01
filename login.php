<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<?php session_start();  ?>
     <div class="container - lg">
    <h1 style="text-align: center;" class="mt-3">Web Manaboard</h1>
    <div class="container mt-3">
    <?php 
    include "nav.php";
    ?>
    <?php
    if(isset($_SESSION["error"])){ 
    ?>
    <div class="container mt-3" style="width: 26.5rem;" >
        <div class="alert alert-danger">
            <span>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</span>
        </div>
    </div>
    <?php unset($_SESSION['error']); }?>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
        <div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <div class="card">
                <div class="card-header">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <form action="verify.php" method="POST">
                    <div class="form-group">
                        <label for="user" class="form-label">Login:</label>
                        <input type="text" id="user" name="login" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="pass" class="form-label">Password:</label>
                        <input type="password" id="pass" class="form-control"name="password" placeholder="Password" required>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-secondary m-1">Login</button> 
                    <button type="reset" class="btn btn-danger m-1">Reset</button>   
                    </div>
                </form>
            </div>
        </div>
    <p class="text-center mt-3">ถ้ายังไม่ได้เป็นสมาชิก<a href="register.php">กรุณาสมัครสมาชิก</a></p>
</div>
        <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
    </div>
    <br>
    </div>
</div>
</body>
</html>