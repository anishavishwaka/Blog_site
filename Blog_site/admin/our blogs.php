<?php
include "connection.php";
$sql = "SELECT * FROM  blog LEFT JOIN user ON blog.author_id=user.user_id ORDER BY published_date DESC;";
$run = mysqli_query($conn,$sql);
$row=mysqli_num_rows($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog-site</title>
	<!--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
-->
    <link rel="stylesheet" href="css/blog.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h2 class="heading">Blog</h2>
	<div class="row">
		<div class="col">
<?php
        if($row){
              while($result=mysqli_fetch_assoc($run)){
 ?>
            
<div class="card">
<div class="card-body">
<div class="image">
<a href=""><?php $img= $result['image'] ?><img src="upload/<?=$img ?>"></a>
</div>
<div class="title">
<a href="" id="title"><?= ucfirst( $result['Title']) ?></a>
<p>
<a href="" id="body"> <?= strip_tags(substr($result['Article'],0,300))."....." ?></a> 
<span><br>

<a href="blog.php?id=<?= $result['blog_id'] ?>" class="btn"  >Continue...</a></span>
</p>
	<ul>
		<li class="user">
		<a href=""> <span>
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	    </span><?= $result['username'] ?></a>
		</li>

		<li class="date">
		<a href=""> <span>
		<i class="fa fa-calendar-o" aria-hidden="true"></i></span>
		 <?php $date= $result['published_date']?>
         <?= date('d-M-Y',strtotime($date)) ?>
		 </a>
		</li>
	    </ul>
		</div>
		</div>
	    </div>
        <?php } }
        ?>
</body>
</html>
			  