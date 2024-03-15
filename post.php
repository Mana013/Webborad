<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php session_start();  ?>
    <div class="container-lg">
<h1 style="text-align: center;" class="mt-3">Web ManaBoard</h1>
<?php 
    include "nav.php";
    ?>
    <?php
    if(isset($_SESSION["error"]))
    ?>
<div class="row mt-4">
    <div class="col-lg-3 col-md-2 col-sm-1"></div>
    <div class="col-lg-6 col-md-8 col-sm-10"></div>

<?php
 $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
 $sql = "SELECT post.title,post.content,post.post_date,user.login FROM post INNER JOIN user ON (post.user_id=user.id) WHERE post.id=$_GET[id]";
 $result =$conn->query($sql);
 while ($row = $result->fetch()) {
    echo "<div class='card border-primary'>";
      echo  "<div class='card-header bg-primary text-white'>$row[0]</div>";
        echo "<div class='card-body'>$row[content]<br>$row[3] : $row[2]</div>";
    echo "</div>";
 }
?>

    <?php
include "db_connect.php"; 
$post_id = $_GET['id'];
$comment_query = "SELECT comment.content, comment.post_date, user.login FROM comment INNER JOIN user ON comment.user_id = user.id WHERE comment.post_id = $post_id ORDER BY comment.post_date ASC";
$comment_result = mysqli_query($conn, $comment_query);
if (mysqli_num_rows($comment_result) > 0) {
    $commentNumber = 1;
    while ($comment_row = mysqli_fetch_assoc($comment_result)) {
        echo '<div class="card border-info mt-3">';
        echo '<div class="card-header bg-info text-white">ความคิดเห็นที่ ' . $commentNumber . '</div>';
        echo '<div class="card-body">';
        echo '<p>' . $comment_row['content'] . '</p>';
        echo '<div> ' . $comment_row['login'] . ' - ' . $comment_row['post_date'] . '</div>';
        echo '</div></div>';
        $commentNumber++;
    }
} else {
   echo '<p class="text-muted">ยังไม่มีความคิดเห็น</p>';
}
mysqli_close($conn);
?>

        <?php if(isset($_SESSION['id'])) { ?>
        
        <div class="card border-success mt-3">
        <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>   
       <div class="card-body">
        <form action="post_save.php" method="post">
            <input type="hidden" name="post_id"
            value="<?= $_GET['id'];?>">
            <div class="row mb-3 justify-content-center">
                <div class="col-lg-10">
                    <textarea name="comment" rows="8"
                    class="form-control" required></textarea>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-sm text-white">
                    <i class="bi bi-box-arrow-up-right"></i>ส่งข้อความ
                </button>
                    <button type="reset" class="btn btn-danger btn-sm ms-2">
                        <i class="bi bi-x-square"></i> ยกเลิก</button>
            </div>
        </div>
    </form>           
    </div>
</div>
    <?php } ?>
<br>
</div>
<div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>
</div>
</body>
</html>