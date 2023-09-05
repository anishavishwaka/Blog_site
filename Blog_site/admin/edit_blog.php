<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['user_data'])) {
    $author_id= $_SESSION['user_data'][0];
}
//GET ID
    echo  $blogID= $_GET['id'];
    $sql= "SELECT * FROM blog LEFT JOIN  user ON 
    blog.author_id = user.user_id WHERE blog_id ='$blogID' ORDER BY  blog.published_date DESC";
    $query=mysqli_query($conn, $sql);
    $result=mysqli_fetch_assoc($query);
?>
<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
</head>
<body>
<div class="container">
<div class="row">
 <div class="col-xl-7 col-lg-5">
 <div class="card">
 <div class="card-header">
<h6 class="font-weight-bold text-primary mt-2">Edit article</h6>
</div>
 <div class="card-body">
 <form action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
 <input type="text" name="Title" placeholder="Title" class="form-control" required value="<?=$result['Title']?>" >
 </div>
 <div class="mb-3">
<label>write article</label>
<textarea name="Article" class="form-control" id="blog" placeholder="Article" required>
<?=$result['Article']?>
</textarea>  
</div>
<div class="mb-3">
<input type="file" name="image" class="form-control">
 <img src="upload/<?=$result['image']?>" width="100px" alt="">
</div>
<div class="mb-3">
<input type="submit" value="UPDATE"  name="edit" class = "btn btn-primary">
<a href="frontpage.php" class = "btn btn-secondary">home</a>
 </div>
 </form>
</div>
</div>
</div>
</div>
</div>
<!--PHP-->

<?php
    if (isset($_POST['edit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['Title']);
    $article = mysqli_real_escape_string($conn, $_POST['Article']);
    $filename= $_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $image_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type= ['jpg','png','jpeg'];
    $destination = "upload/".$filename;
    if(!empty($filename)) {
        if(in_array($image_ext, $allow_type)) {
            if($size <= 2000000) {
                $unlink = "upload/".$result['image'];
                unlink($unlink);
move_uploaded_file($tmp_name,$destination);

 $sql2 =  "UPDATE  blog  SET  Title ='$title', Article = '$article',
 image ='$filename', author_id ='$author_id' WHERE  blog_id=  '$blogID' ";

$query2 = mysqli_query($conn, $sql2);
if($query2) {
 $msg =['updated','alert-success'];
                    $_SESSION['msg'] = $msg;
                   header("location:dashboard.php");
                } else {
                    echo "error";
                    $msg =  ['failed','alert-danger'];
                    $_SESSION['msg'] = $msg;
                    header("location:dashboard.php");
                }
            }
 else {
             $msg=['large file','alert-danger'];
             $_SESSION['msg']=$msg;
            header("location:dashboard.php");
 }
 }
 else {
            $msg=['file not allowed','alert-danger'];
            $_SESSION['msg']=$msg;
           header("location:dashboard.php");
     }

 } else {
        $sql2 =  "UPDATE  blog  SET  Title ='$title', Article = '$article', author_id ='$author_id' WHERE blog_id=  '$blogID' ";
        $query2 = mysqli_query($conn, $sql2);
        if($query2) {
            $msg =['updated','alert-success'];
            $_SESSION['msg'] = $msg;
            header("location:dashboard.php");
} else {
            $msg =  ['failed','alert-danger'];
           $_SESSION['msg'] = $msg;
          header("location:dashboard.php");         
 }
 }
}
?> 


<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<Script>
    CKEDITOR.replace('blog');
</Script>
</body>
</html>