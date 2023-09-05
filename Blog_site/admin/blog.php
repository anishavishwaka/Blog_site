<?php
include "connection.php";
session_start();
if(isset($_SESSION['user_data'])){
 $author_id= $_SESSION['user_data'][0];
 }
 $blogID= $_GET['id'];
// $sql= "SELECT * FROM  blog WHERE blog_id= '$blogID'";
$sql = "SELECT * FROM  blog LEFT JOIN user ON blog.author_id=user.user_id WHERE blog_id= '$blogID';";
 $run= mysqli_query($conn,$sql);
 $post= mysqli_fetch_assoc($run);
?>

<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog:site</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      .container{
        display: flex;
        align-items: center;
        justify-content: center;
      }  
      #single-img a img{
      width: 100%;
   }
   ul{
    list-style: none;
}

 ul li{
    margin: 5px;
}

 ul li a {
    text-decoration: none;
    color: black;
}

 ul li a i{
    color: black;
}

</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">

</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body">
                    <ul>
		<li class="user">
		<a href=""> <span>
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	    </span><?= $post['username'] ?></a>
		</li>

		<li class="date">
		<a href=""> <span>
		<i class="fa fa-calendar-o" aria-hidden="true"></i></span>
		 <?php $date= $post['published_date']?>
         <?= date('d-M-Y',strtotime($date)) ?>
		 </a>
		</li>
	    </ul>
	 
                    <div id = "single-img">
                    <?php $img=$post['image']?>
                    <a href="upload/<?= $img ?>">
                        <img src="upload/<?= $img ?>" alt="">
                    </a>
                    <div>
                        <hr>
                        <h5><?= ucfirst($post['Title'] )?></h5>
                        <p><?= $post['Article'] ?></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>