<?php
include "connection.php";

  $keyword = $_GET['keyword'];
  $sql = "SELECT * FROM  blog LEFT JOIN user ON blog.author_id=user.user_id WHERE  Title like '%$keyword%' OR Article like '%$keyword%'  ORDER BY published_date DESC;";
  $run = mysqli_query($conn,$sql);
  $row=mysqli_num_rows($run);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog site:search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
 <link rel="stylesheet" href="css/blog_search.css">
 
  

</head>
<body>
    <h1 class="heading">search</h1>
    <?php
if (isset($_GET['keyword'])){
    $keyword= $_GET['keyword'];
}
else{
    $keyword="";
}
    ?>
    <h3>Search Result For:<span class="text-primary" ><?= $keyword ?></span></h3>
    <form class = "d-flex" action="search.php" method="get">
        <input class="srch" type="search" name="keyword" maxlength="70" autocomplete="off" required value="<?=$keyword?>" placeholder="Type to Search"   width="100px" >
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class = "container">
    <div class="row">
    <div class="col"> 
        <?php
    if($row){
              while($result=mysqli_fetch_assoc($run)){
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="image">
                        <a href="">
                        <?php $img= $result['image'] ?>
                            <img src="upload/<?=$img ?>" alt=""></a>
                             </a>
                    </div>
                    <div class="title">
                        <a href="" id = "title"><?= ucfirst( $result['Title']) ?></a>
                        <p>
                           <a href="" id="article"><?= strip_tags(substr($result['Article'],0,300))."....." 
                            ?>
                            </a> <span><br>
                           <a href="my blog.php?id=<?= $result['user_id'] ?>" class = "btn btn-sm btn-outline-primary">Continue Reading</a> </span>
                        </p>
                        <ul>
                            <li class="me-2"> <a href=""><span><i class= "fa-envelope-square"></i></span>
                            <?= $result['username'] ?>
                        </a></li>
                        <li class="me-2"> <a href=""><span><i class= "fa-envelope-square"></i></span>
                        <?php $date= $result['published_date']?>
                        <?= date('d-M-Y',strtotime($date)) ?>
                        </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } } else{
                echo "<h5 class='text-danger'> No Result Found</h5>";
            }
        ?>
        </div>

</body>
</html>