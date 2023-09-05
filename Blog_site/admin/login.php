<?php 
require "connection.php";
session_start();
if(isset($_SESSION['user_data'])){
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-4 m-auto p-5 mt-5 bg-info">
                <div class="mb-3">
                    <p  class="text-center" >login here</p>
                  <form action="" method="post" autocomplete="on"  class="mb-3" >          
                   <label for="email">Email</label>
                   <input type="email" class="form-control" name="email" id="email" required> 
                   <label for="password">password</label>
                   <input type="password"class="form-control" name="password" id="password" required><br>
                   <input type="submit"class="btn btn-primary" name="submit" value="login">
                   <?php
                   if(isset($_SESSION['error'])){
                    $error=$_SESSION['error'];
                    echo $error;
                    unset($_SESSION['error']);
                   }
                   ?>
                   <p>Don't have account register here:<a href="register.php">register</a></p>      
                   
    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
if (isset($_POST['submit'])){
    $email= ($_POST['email']);
    $password= ($_POST['password']);
   $sql="SELECT * FROM user  WHERE email = '{$email}' AND password= '{$password}' ";
   $query=mysqli_query($conn,$sql);
   $data=mysqli_num_rows($query);
   if($data){
    $result=mysqli_fetch_assoc($query);
    $user_data=array($result['user_id'],$result['username'],$result['email']);
    $_SESSION['user_data']=$user_data;
    header("location:frontpage.php");
   }
   else{
    $_SESSION['error']="invalid";
    header("location:login.php");
   }
}
?>

</body>
</html>
 