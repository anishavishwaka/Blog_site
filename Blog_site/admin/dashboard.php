<!--PHP-->
<?php include "connection.php";
if(isset($_SESSION['user_data'])) {
 $userID=$_SESSION['user_data']['0'];
}
//GET BLOG ID

?>
<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
<!--CSS-->
<style>
    h2{
        text-align: center;
    }
    p{
        margin-left: 870px;
        margin-top: -49px;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: 500;
    }
</style>
</head>
<body>
<div class="container-fluid">
<h2>WELCOME</h2>
<?php
        session_start();
        if(isset($_SESSION['user_data'])){
            //echo $_SESSION['user_data']['1'];
        ?>
        <p> <?php echo  $_SESSION['user_data']['1'];?>
        </p>
            
    <?php
        }
?>
<h2 class="mb-2 text-gray-800  text-center">Your  Posts</h2>
<div class="card shadow">
 <div class="card-header py-3 d-flex justify-content-between">
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
     <tr>
         <th>Sr.No</th>
         <th>Title</th>
         <th>Author</th>
         <th>Date</th>
         <th colspan="3">Operation</th>
     </tr>
 </thead>
<tbody>
    <!--PHP-->
<?php
    if(isset($_SESSION['user_data'])) {
    $userID = $_SESSION['user_data']['0'];
    $sql= "SELECT * FROM blog LEFT JOIN  user ON 
          blog.author_id=user.user_id WHERE user_id='$userID'
          ORDER BY blog.published_date DESC";
    $query=mysqli_query($conn, $sql);
    $row=mysqli_num_rows($query);
    $count=0;
    if($row) {
        while($result=mysqli_fetch_assoc($query)) {
 ?>
 <!--HTML-->
<tr>
    <td><?= ++$count ?></td>
    <td><?= $result['Title'] ?></td>
    <td><?= $result['username'] ?></td>
    <td><?= date('d-M-Y', strtotime($result['published_date'])) ?></td>
    <!--OPERATIONS-->
<td>
<a href="edit_blog.php?id=<?= $result['blog_id'] ?>"
 class="btn btn-sm btn-success">Edit</a>
</td>
<!--DELETE]-->
 <td>
<form class="mt-2"  method="POST"onsubmit="return confirm('are u sure')">
<input type="hidden" name="id" value="<?= $result['blog_id'] ?>" class="btn btn-sm btn-danger" >
<input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger" >
 </form>
 </td>
<td><a href=" blog.php?id=<?= $result['blog_id'] ?>" class = "btn btn-sm btn-outline-primary">Read</a> </span>
</td>
</tr>
<?php
        }
    }
}
 else{
 ?>
    <tr><td colspan="7">NO result found</td></tr>
 <?php    
}
 ?>
  <?php
if (isset($_POST['deletePost'])){
    $id=$_POST['id'];
    $image= "upload/".$_POST['image'];
    $delete="DELETE FROM blog WHERE blog_id= '$id'";
    $run=mysqli_query($conn,$delete);
    if($run){
        unlink($image);
        $msg=['Post has been deleted','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:dashboard.php");
        echo "success";
    }
else{
    $msg=['failed','alert-danger'];
    $_SESSION['msg']=$msg;
    header("location:dashboard.php");
    echo "failed";
}
}
?>
  </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
</body>
</html>