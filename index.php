<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<?php session_start();
?> 
<body>
<div class="container - lg">
    <h1 style="text-align: center;">Web Board Mana</h1>
    <form action="post.php" method="get">
        <div class="container-fluid">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                    <form class="d-flex"><?php if(!isset($_SESSION['id'])) { ?>                     
                        <a href="login.php" class="navbar-brand"><i class="bi bi-box-arrow-in-left"></i> เข้าสู่ระบบ</a>
                            <?php }else{ if ($_SESSION["role"] == 'm'&& isset($_SESSION['id'])) { ?>
                                <nav class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "<i class='bi bi-people-fill'></i> $_SESSION[username]" ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                                </ul>
                            </nav>
                            <?php  }if($_SESSION["role"] == 'a'&& isset($_SESSION['id'])) { ?>
                                <nav class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "<i class='bi bi-people-fill'></i> $_SESSION[username]" ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="category.php"><span class="">จัดการหมวดหมู่</span></a></li>
                                    <li><a class="dropdown-item" href="logout.php"><span class="">จัดการผู้ใช้งาน</span></a></li>
                                    <li><a class="dropdown-item" href="logout.php"><span class="">ออกจากระบบ</span></a></li>
                                </ul>
                            </nav>
                            
                                <?php }}?>
                    </form>
                </div>
            </nav>
        </div>                        
    <div class="mt-3 d-flex justify-content-between"> 
    <div class="dropdown-center">หมวดหมู่:
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">ทั้งหมด</button>
            <ul class="dropdown-menu " aria-labelledby="Button2"  >
                <li><a href="index.php" class="dropdown-item">ทั้งหมด</a></li>
                    <?php 
                            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                            $sql="SELECT * FROM category";
                            foreach($conn->query($sql)as $row){
                                echo "<li><a class='dropdown-item' href='index.php?cat=$row[0]'>$row[1]</a></li>";
                                                             
                            }                          
                            $conn=null;
                            ?>   
                        </ul>
                    </div>
</span>
        
        <?php if(isset($_SESSION['id'])) {?>
        <div >  <a href="newpost.php" class="btn btn-success btn-sm "><i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a> </div>
        <?php }?>
    </div>
         
    <table class="table table-striped mt-4">
    <?php       
         $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
         if(isset($_GET["cat"])){
         $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t1.user_id FROM post as t1 
         INNER JOIN user as t2 ON (t1.user_id=t2.id) 
         INNER JOIN category as t3 ON (t1.cat_id=t3.id)WHERE t3.id=$_GET[cat] ORDER BY t1.post_date DESC";
         }
         else{
            $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t1.user_id FROM post as t1 
         INNER JOIN user as t2 ON (t1.user_id=t2.id) 
         INNER JOIN category as t3 ON (t1.cat_id=t3.id)  ORDER BY t1.post_date DESC";
         }
         $result=$conn->query($sql);
        while($row = $result->fetch()){
            if(isset($_SESSION['id'])&& $_SESSION['role'] == 'm'){
                if($_SESSION['user_id']!= $row[5]){
                echo"<tr><td class=col-10>[$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><BR>$row[3] : $row[4]</td><td class=col-1></td><td class=col-1></td></tr>";
                }
                else{
                echo "<tr><td class=col-10>[$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><BR>$row[3] : $row[4]</td><td class=col-1><a href='editpost.php?edit=$row[2]&user=$row[5]' name='edit'  class='btn btn-warning bi bi-pencil-fill'>แก้ไข</a></td>";
                echo "<td class=col-1><a href='delete.php?del=$row[2]&user=$row[5]' name='del' onclick='return myConfirm()' class='btn btn-danger bi bi-trash'></a></td></tr>"; }
            }
            elseif(isset($_SESSION['id'])&& $_SESSION['role'] == 'a'){
                if($_SESSION['user_id']!=$row[5]){
                echo"<tr><td class=col-10>[$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><BR>$row[3] : $row[4]</td><td class=col-1></td><td class=col-1><a href='delete.php?del=$row[2]&user=$row[5]' name='del' onclick='return myConfirm()' class='btn btn-danger bi bi-trash'></a></td></tr>";
                }
                else{
                echo "<tr><td class=col-10>[$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><BR>$row[3] : $row[4]</td><td class=col-1><a href='editpost.php?edit=$row[2]&user=$row[5]' name='edit'  class='btn btn-warning bi bi-pencil-fill'>แก้ไข</a></td>
                <td class=col-1><a href='delete.php?del=$row[2]&user=$row[5]' name='del' onclick='return myConfirm()' class='btn btn-danger bi bi-trash'></a></td></tr>";
            }
        }
            else echo"<tr><td>[$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><BR>$row[3] : $row[4]</td></tr>";
        }
        $conn=null;
        ?> 
    </table>  
</div>
</body>
    <script>
        function myConfirm(){
            txt = confirm('ต้องการลบกระทู้นี้ใช่หรือไม่');
            if(txt){
                document.location.href=`delete.php?del=$row[2]`;
                return true;
            }
            else {
                return false;
            }
        }
    </script>
</html>