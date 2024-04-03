<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php session_start();
?>
<div class="container-lg">
<h1 style="text-align: center;" class="mt-3">Web Board Mana</h1>
    <?php include"nav.php"; 
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="SELECT post.title,post.content,post.post_date,user.login FROM post  
    INNER JOIN user ON (post.user_id=user.id ) WHERE post.id=$_GET[id] ";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
    $data=$result->fetch(PDO::FETCH_ASSOC);
    $_SESSION["title"] = $data['title'];
    $_SESSION["content"] = $data['content'];
    }
    ?>    
    <div class="container_lg">    
    <div class="row mt-4">
    <div class="col-lg-3 col-md-2 col-sm-1"></div> 
        <div class="col-lg-6 col-md-8 col-sm-10"> 
            <div class="card border-primary mt-3">      
            <div class="card-header bg-primary text-white"><?php echo "$_SESSION[title]"; ?></div>            
                <div class="card-body"> 
    <?php  echo "$_SESSION[content]<br>$data[login]:$data[post_date]";
    $conn=null;
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="SELECT * FROM comment INNER JOIN user ON (comment.user_id=user.id ) WHERE post_id= $_GET[id]";
    $result=$conn->query($sql);
    $i=1;
         while($row = $result->fetch()){
            
        ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-lg">
    <div class="row mt-4">
        
    <div class="col-lg-3 col-md-2 col-sm-1"></div> 
        <div class="col-lg-6 col-md-8 col-sm-10"> 
            <div class="card border-info mt-3">      
                <div class="card-header bg-info text-white"><?php echo "ความคิดเห็นที่ $i"; ?></div>            
                <div class="card-body"> 
    <?php  echo "$row[content]<br>$row[login]:$row[post_date]";
    $i++;     }
    $conn=null;
     if(isset($_SESSION['id'])) {    
        ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-lg"> 
    <div class="row mt-4">
        
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card border-success mt-3">
                <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
                <div class="card-body">
                    <form action="post_save.php" method="post">
                        <input type="hidden" name="post_id" value="<?= $_GET['id'];?>">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-lg-10">
                                <textarea name="comment"  rows="8" class="form-control" require></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-sm text-white mx-1"><i class="bi bi-box-arrow-up-right"></i> ส่งข้อความ</button>
                                <button type="reset" class="btn btn-danger btn-sm mx-1"><i class="bi bi-x-square"></i> ยกเลิก</button> 
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php  }  ?>

   
</body>
</html>