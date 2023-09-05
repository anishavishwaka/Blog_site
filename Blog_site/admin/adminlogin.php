<?php
require ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
</head>
<body>
    <div class="login-form">
        <h2>ADMIN LOGIN</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" name="Admin_Name" placeholder="Admin Name">
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="Admin_Password" placeholder=" Admin_Password">
                <span><i class="fa fa-eye" aria-hidden="true" onclick="toggle()"></i></span>
            </div>
            <input type="submit" value="login" class="btn" name="signin">
        </form>
    </div>

<?php

if(isset($_POST['signin'])){
    $username = $_POST['Admin_Name'];
    $password = $_POST['Admin_Password'];

    $sql = "SELECT * FROM   admin  WHERE Admin_Name = '$username'
    AND  Admin_Password = '$password'";

   // $result = mysqli_query($conn , $query);

   $query=mysqli_query($conn,$sql);
   $data=mysqli_num_rows($query);
   
    //if (mysqli_num_rows($result)==1) 
    if($data)
    {
        session_start();
        $_SESSION['AdminloginId'] = $_POST['Admin_Name'];
        header("location:adminpanel.php");
      }
      else{
        echo "<script> alert('Incorrect Password');</script>";
      }


}


?>
    <script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("password").setAttribute("type","password");
            state = "false";
        }
        else{
            document.getElementById("password").setAttribute("type","text");
            state = "true";

        }
    }
    </script>

</body>
</html>