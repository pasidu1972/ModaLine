<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resourses/zarad.svg">

</head>

<body>

        <!--HEDDRE-DIV-->
        
        <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar" >
                <li><a href="index.html">Home</a></li>
                <!-- <li><a href="shop.html">Shop</a></li> -->
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a  href="contact.html">Contact</a></li>
                <li><a href="cart.html"><i class="bi bi-bag-check"></i></a></li>
            </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

    </section>
     
      
    <!--HEDDRE-DIV-->
   

    <script src="script.js"></script>
</body>

</html>



