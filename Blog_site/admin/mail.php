<?php
$servername = "localhost";
$username =  "root";
$password = "";
$dbname = "my user";


$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die('Connection Failed : ' .$conn ->connect_error);
}
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $sql1 = "INSERT INTO `peoples` ( `name`, `email`, `phone`, `message`) VALUES ( '$name', '$email', '$phone', '$message ');";

if($conn->query($sql1)==true){
     echo "msg sent";
}
else{
    echo "error";
}
$conn->close();

?>
