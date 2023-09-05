<?php
include "connection.php";
session_start();
if(isset($_SESSION['user_data'])) {
        $user_data=$_SESSION['user_data']['1'];
        $user_data;
        unset($_SESSION['user_data']);
}

if(isset($_POST['register'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
    if(strlen($username) < 4 || strlen($username) >100) {
         echo "not allowed";
    }
    elseif(strlen($password) < 4 ){
         echo "password  must be in 4 letter";
    }
    elseif($password!=$confirmpassword){
  echo "password does not match";
    }
else{
    $sql =  "SELECT * FROM user WHERE  email= '$email'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($query);
    if($row>=1){
        echo "email is taken";
    }
    else{
        $sql2= "INSERT INTO  user (username,email,password) VALUES('$username',
        '$email', '$password')";
        $query2=mysqli_query($conn,$sql2);
        if($query2){
            echo "added";
            header("location:login.php");
            $user_data=array($result['user_id'],$result['username'],$result['email']);
            $_SESSION['user_data']=$user_data;
        
        }
        else{
            echo "failed";
        }
    }
}

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
        <div class="col-md-5 m-auto bg-info p-4">
            <form action="" method="POST">
                <p class="text-center">Register here</p>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="username"  class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="email"  class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="password"  class="form-control" required>
                </div><div class="mb-3">
                    <input type="password" name="confirmpassword" placeholder="confirmpassword"  class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="register" value="Register"   class="btn btn-primary" >
                </div>
                <p>Already have account login here:<a href="login.php">login</a></p> 
            </form>
        </div>
    </div>
</div>
</body>
</html>
