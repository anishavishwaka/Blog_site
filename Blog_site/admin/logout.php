<?php
include "connection.php";
session_start();
session_unset();
session_destroy();
header("location:http://localhost/htdocs/Blog%20Site/admin/home.php");
exit();
    
    ?>