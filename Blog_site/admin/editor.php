<?php
    require "connection.php";
    session_start();
    if(isset($_SESSION['user_data'])){
          $author_id= $_SESSION['user_data'][0];
     }
?>
<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog site :editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
</head>
<body>
    <div class="container">
        <h5 class="mb-2 text-gray-800">Blogs</h5>
        <div class="row">
            <div class="col-xl-7 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary mt-2">write article</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="Title" placeholder="Title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>write article</label>
                             <textarea name="Article" class="form-control" id="blog" placeholder="Article" required></textarea>  
                            </div>
                         <div class="mb-3">
                            <input type="file" name="image" class="form-control" required>
                         </div>
                         <div class="mb-3">
                         <input type="submit" value="Publish"  name = "add-article" class = "btn btn-primary">
                         <a href="frontpage.php" class = "btn btn-secondary">home</a>
                         </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
if (isset($_POST['add-article'])){
    $title = mysqli_real_escape_string($conn,$_POST['Title']);
    $article = mysqli_real_escape_string($conn,$_POST['Article']);
    $filename= $_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type= ['jpg','png','jpeg'];
    $destination = "upload/".$filename;
    if(in_array($image_ext,$allow_type)){
        if($size <= 2000000){
            move_uploaded_file($tmp_name,$destination);
        $sql2 = "INSERT INTO  blog( Title, Article, image, author_id)
            VALUES('$title','$article','$filename','$author_id')";
            $query = mysqli_query($conn,$sql2);
            if($query){
                $msg =['posted','alert-success'];
                $_SESSION['msg'] = $msg;
                header("location:our blogs.php");
            }
            else {
                $msg =  ['failed','alert-danger'];
                $_SESSION['msg'] = $msg;
                header("location:editor.php");
            }
        }
        else{
            $msg=['large file','alert-danger'];
                $_SESSION['msg']=$msg;
                header("location:editor.php");

        }
    }
    else{
        $msg=['file not allowed','alert-danger'];
                $_SESSION['msg']=$msg;
                header("location:editor.php");

    }


}






?>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<Script>
    CKEDITOR.replace('blog');
</Script>
</body>
</html>