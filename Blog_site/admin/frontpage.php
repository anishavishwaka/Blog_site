<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>
    <!--Css links-->
   <link rel="stylesheet" href="css/welcome.css">
    <!--box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--font awsome-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <!--top bar-->
    <header>
        <div class="top-bar">
           <a href="home.html">
           <div class="dots-wrapper">
               <div id="dot1" class="browser-dot"></div>
               <div id="dot2" class="browser-dot"></div>
               <div id="dot3" class="browser-dot"></div>
           </div>
           </a>
            <form>
              <label  class='bx bx-search-alt-2'></label>
               <input type="search" placeholder="Type to search" class="srch" name="keyword">
               <i class='bx bx-refresh'></i>
           </form>
    </div>
    </header>
    <!--top bar end-->
    <!--nav bar start-->
        <section>
            <div class="nav-bar">
                <div class="logo">
                    <h1>B</h1>
                    <p>Blog <br>Site</p>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="our blogs.php">Blog</a></li>
                        <li><a href="search.php">search</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <a href="logout.php"><li class="logout">logout</a></li>
                        <li><a href="adminlogin.php">Admin</a></li>
                    </ul>
                    <div class="search">
                        <a href="#">   
                            <label class='bx bx-search-alt-2' ></label>
                        </a>
                        <input class="serch" type="search" name="" placeholder="Type To search">
                    </div>       
                </div>
                </div>
                
                
            </div>
            <div class="menu-icon">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            
        </section>
    <!--nav bar end-->

<!--home page start-->
<section>
    <div class="home-page">
       <div class="content">
        <h1 class="heading">
            <span class="small"> welcome to blog-site</span>
            <span class="small1">the world of</span>
            blog
            <span class="no-fill">writing</span>
        </h1>
       <a href="editor.php"class="btn" > Write a blog </a>
       </div>
    </div>
</section>
<!--home page end-->
<!--contact section start-->
<section class="contact" id="contact">
    <div class="content">
        <h2 class="heading">Contact Me</h2>
    </div>
    <div class="container">
        
        <div class="contactInfo">
            <div class="box">
                <div class="icon">
                    <a href="https://maps.app.goo.gl/SJGdwcCRqRKPH5cF7">
                    <icon class="fa fa-map-marker"></icon></a>
                </div>
                <div class="text">
                    <h3>Address</h3>
                    <p>New Delhi</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><a href="anishavishwakarma353@gmail.com"><icon class="fa fa-envelope-square" aria-hidden="true"></icon></a>
                </div>
                <div class="text">
                    <h3>email</h3>
                    <p>anishavishwakarma353@gmail.com</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><a href="tel:9471941594"><icon class="fa fa-phone-square" aria-hidden="true"></icon></a>

                </div>
                <div class="text">
                    <h3>phone</h3>
                    <p>8977667665</p>
                </div>

            </div>
        </div>
    
        <div class="contactForm">
            <form action="mail.php" method="post">
                <div class="inputbox">
                    <input type="text" name="name" required>
                    <span>Full Name</span>
                </div>
                <div class="inputbox">
                    <input type="email" name= "email" required>
                    <span>Email id</span>
                </div>
                <div class="inputbox">
                    <input type="text" name= "phone" required>
                    <span>Phone</span>

                </div>
                <div class="inputbox">
                    <textarea required="required" name="message"></textarea>
                    <span>Send Your Query!</span>
                </div>
                <div class="inputbox">
                    <input type="submit" name=" " value="Send">
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<!--contact section end-->

<!--footer section-->
<div class="footer">
    <nav class="social">
            <a href="#"> <label class='bx bxl-instagram'></label></a>
            <a href="#"> <label class='bx bxl-twitter'></label> </a>
            <a href="#"><label class='bx bxl-facebook-circle'></label> </a>
    </nav>
<h6 class="text"> Design by Anisha Vishwakarma</h6>
</div>
<!--footer section end-->
</body>
</html>