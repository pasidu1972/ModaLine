<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | zarad</title>
	<link rel="stylesheet" href="bootstrap.css" />
	<!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
	<!-- <link rel="stylesheet" href="assets/css/shop.css" /> -->
	<!-- <link rel="stylesheet" href="assets/css/my-product.css" /> -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/favicon.svg" >
    <link rel="icon" href="resourses/zarad.svg">

    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; ">
   
        <!--HEDDRE-DIV-->

        <section id="header">
            <a href="home.php"><img src="resourses/img/logo.png.png" class="logo" alt=""></a>




            <div>
                <ul id="navbar">
                    <li><a href="home.php">Home</a></li>
                    <!-- <li><a href="shop.php">Shop</a></li> -->
                    <li><a href="addProduct.php">Add Product</a></li>
                    <li><a href="contact.php">Watchlist</a></li>
                    <li><a href="advancedSearch.php">Advanced</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="cart.php"><i class="bi bi-bag-check"></i></a></li>
                    <li><a class="active" href="userProfile.php"><img style="size: 100px;margin-top:2px;" src="resourses/profile.svg" alt=""></></a></li>
                </ul>
            </div>

            <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

        </section>


        <!--HEDDRE-DIV-->
    
    <div class="container" style="background-color: white; border-radius: 20px; max-width: 450px; padding-bottom: 30px; margin-top: 40px; margin-bottom: 70px;margin-left:auto;margin-right:auto;box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.10);">
        <div class="row justify-content-center">
            <div class="col col-11">
                <div class="d-flex justify-content-between px-4 pt-4 align-items-center" style="margin-top: 10px;">
                    <div>
                        <h1 style="font-weight: 600; font-size: 24px; margin-top: 5px;">Invoice</h1>
                    </div>
                    <div >
                        <a href="home.php"><img src="resourses/ico-close.svg" alt=""></a>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 0 40px; margin-top: 40px;">
            <div class="col col-12" >
                <div class="d-flex justify-content-center">
                    <img src="resourses/img-success.svg" style="max-width: 72px;" alt="">
                </div>
                <h1 class="text-center" style="font-weight: 500; font-size: 18px; color: #626262; margin-top: 20px;">Payment Success</h1>
                <h1 class="text-center" style="font-weight: 600; font-size: 24px; margin-top: 5px;">LKR 410,000</h1>
            </div>
            <div class="col col-12" >
                <div class="d-flex justify-content-between" style="display: flex;justify-content: space-between;margin-top: 0px;">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Ref Number</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">00035468</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Payment Time</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">25-02-2023, 13:22:16</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Payment Method</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">Online</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Card Number</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">2350 0000 2356 2000</h1>
                </div>
            </div>

            <div class="col col-12" style="margin-top: 40px;">
                <div style="min-width: 100%; border: 1px #D7D7D7 solid; margin-bottom: 40px;margin-top: -50px"></div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">1 X Wireless Mouse</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 15,600</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">1 X Gaming Chair</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 47,500</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">1 X Mac book air M1</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 360,000</h1>
                </div>
            </div>
            <div class="col col-12" style="margin-top: 40px;">
                <div style="min-width: 100%; border: 1px #D7D7D7 solid; margin-bottom: 40px;margin-top: -50px"></div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Total Amount</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 407,500</h1>
                </div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Handling Fees</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 2,500</h1>
                </div>
            </div>
            <div class="col col-12" style="margin-top: 40px;">
                <div style="min-width: 100%; border: 1px #D7D7D7 solid; margin-bottom: 40px;margin-top: -50px"></div>
                <div class="d-flex justify-content-between" style="margin-top: 9px;display: flex;justify-content: space-between;margin-top: -50px">
                    <h1 class="text-center" style="font-weight: 500; font-size: 16px; color: #626262;">Grand Amount</h1>
                    <h1 class="text-center" style="font-weight: 600; font-size: 16px; color: #1e1e1e;">LKR 410,000</h1>
                </div>
            </div>
            <div style=" margin-top: 15px; margin-bottom: 15px;">
                <button class="btn  wsh-admin-btn-primary col-12 mt-4 border-0" style="min-width:100%;">Download Reciept</button>
            </div>
            </div>
        </div>
    </div>

    
    <!-- <div class="" style="position: absolute; top: 0px;" >
        <div class="Olay" id="Olay">
        <div class="" style="display: flex; justify-content: center;">
            <div class="col Olay-fore"></div>
        </div>
    </div> -->

    </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
<?php include "footer.php"; ?>
</html>