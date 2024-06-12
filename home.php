<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>ModaLine</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product_card.css">

    <link rel="icon" href="img2/l1.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>

</head>

<body style="background-color: #D9D9D9;">








    <!--HEDDRE-DIV-->

    <section id="header">
        <a href="home.php"><img src="img2/logo (2).png" class="logo" alt="" ></a>




        <div>
            <ul id="navbar">
                
               
                
                <li><a href="cart.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Shopping Bag.png" alt=""></></a></li>
                <li><a href="userProfile.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Male User.png" alt=""></></a></li>
                <li><a href="index.php#"><img  style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Logout.png" alt=""></></a></li>
               

                
            </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

    </section>


   

    <!--HEDDRE-DIV-->

    <section id="header" style="height: 20px; background-color: #D9D9D9;">

    
        <div class="liq" style="margin-left: 200px;margin-right:0px;">
            <ul id="navbar" style="width: 1000px; height: 20px; font-weight: 8px; margin-right:100px;" >
                <li style="margin-top: 10px;"><a href="home.php">Home</a></li>
              
                <li style="margin-top: 10px;"><a href="addProduct.php">Add Product</a></li>
                <li style="margin-top: 10px;"><a href="watchlist.php">Watchlist</a></li>
                <li style="margin-top: 10px;"><a href="advancedSearch.php">Advanced</a></li>
                <li style="margin-top: 10px;"><a href="about.php">About</a></li>
               

                
            </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

    </section>


    <!--HEDDRE-DIV-->



    <div class="home-main-div">




        <div class="col-12" id="basicSearchResult">
            <div class="">

                <!-- Carousel -->
                <div id="carouselExampleCaptions" class=" carousel slide carousel-fade border border-primary" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                        <img style="margin-left: auto;margin-right:auto;width:100%;height: 900px;" src="img2/bg (3).jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title" style="margin-left: 250px;margin-bottom: 200px;color: #FFF;font-family: Poppins;font-size: 80px;">Welcome to ModaLine</h5>
                                <button class="" style="width: 300px;height: 60px;color: #FFF;font-family: Poppins;font-size: 16px; font-style: normal; font-weight: 600;background: #98002C;justify-content: center;margin-left: 250px;">SHOP NOW</button>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                        <img style="margin-left: auto;margin-right:auto;width:100%;height: 900px;" src="img2/bg (2).jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title" style="margin-left: 250px;margin-bottom: 200px;color: #FFF;font-family: Poppins;font-size: 80px;">Welcome to ModaLine</h5>
                                <button class="" style="width: 300px;height: 60px;color: #FFF;font-family: Poppins;font-size: 16px; font-style: normal; font-weight: 600;background: #98002C;justify-content: center;margin-left: 250px;">SHOP NOW</button>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img style="margin-left: auto;margin-right:auto;width:100%;height: 900px;" src="img2/bg (1).jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title" style="margin-left: 250px;margin-bottom: 200px;color: #FFF;font-family: Poppins;font-size: 80px;">Welcome to ModaLine</h5>
                                <button class="" style="width: 300px;height: 60px;color: #FFF;font-family: Poppins;font-size: 16px; font-style: normal; font-weight: 600;background: #98002C;justify-content: center;margin-left: 250px;">SHOP NOW</button>
                            </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="2000">
                            <img style="margin-left: auto;margin-right:auto;width:100%;height: 900px;" src="img2/bg (4).jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title" style="margin-left: 250px;margin-bottom: 200px;color: #FFF;font-family: Poppins;font-size: 80px;">Welcome to ModaLine</h5>
                                <button class="" style="width: 300px;height: 60px;color: #FFF;font-family: Poppins;font-size: 16px; font-style: normal; font-weight: 600;background: #98002C;justify-content: center;margin-left: 250px;">SHOP NOW</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button style="height: 800px;margin-top:80px;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button style="height: 800px;margin-top:80px;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <!-- Carousel -->

            <?php

            $c_rs = Database::search("SELECT * FROM `category`");
            $c_num = $c_rs->num_rows;

            for ($y = 0; $y < $c_num; $y++) {

                $c_data = $c_rs->fetch_assoc();

            ?>




                <!-- category names -->

                <div class="min-text-div col-12 mt-3 mb-3" style="width: 500px;margin-top: 40px;margin-left: auto;margin-right: auto; text-align: center;">

                    <a href="#" class="text-decoration-none " style="color: black;font-family: Poppins;font-size: 50px;font-style: normal;font-weight: 600px;line-height: normal;letter-spacing: -0.35px;margin-left: auto;margin-right: auto;margin-top:10px;">

                        <hr style="background-color: black;stroke-width: 100px;height: 0px;margin-left:auto;margin-right:auto;margin-top:50px;"> <?php echo $c_data["cat_name"]; ?></hr>
                    </a>&nbsp;&nbsp;
                    <div>

                    </div>
                </div>

                <div style="margin-left: auto;margin-right:auto;width:103px;">
                    <a href="#"><button style="width: 103px;height: 41px; border-radius: 10px;background: #9E002D;" class="">
                            <p style="text-align: center;color:#FFF;color: #FFF;font-family: Poppins;font-size: 16px;margin-top:10px;"> See All &nbsp;&rarr;</p>
                        </button></a>
                </div>




                <!-- category names -->


                <!-- products -->
                <div class="col-12 mb-3 ">
                    <div class="">

                        <div class="col-12">
                            <div class="row justify-content-center " style="gap: 20px;margin-top: 20px;">

                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE 
                                    `category_cat_id`='" . $c_data['cat_id'] . "' AND `status_status_id`='1' ORDER BY 
                                    `datetime_added` DESC LIMIT 10 OFFSET 0");

                                $product_num = $product_rs->num_rows;

                                for ($x = 0; $x < $product_num; $x++) {
                                    $product_data = $product_rs->fetch_assoc();

                                ?>

                                    <div class="" style="width: 20rem;">

                                        <?php

                                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                            `product_id`='" . $product_data['id'] . "'");

                                        $img_data = $img_rs->fetch_assoc();

                                        ?>



                                        <div class="wsh-card-back">
                                            <div class="wsh-card-img-back">
                                                <!-- <img class="wsh-card-img" src="http://localhost/eshop/resources/img/product_img/p7.svg" alt="" /> -->

                                                <img class="wsh-card-img" src="<?php echo $img_data["img_path"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 301px;border-radius: 20px;" />
                                            </div>
                                            <h5 class="wsh-card-title"><?php echo $product_data["title"]; ?></h5>
                                            <span class="wsh-card-model-name"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                            <span class="wsh-card-price">Rs. <?php echo $product_data["price"]; ?> .00</span><br />

                                            <div class="wsh-card-devider"></div>

                                            <div class="wsh-card-footer">

                                                <button onclick="addToWatchlist(<?php echo $product_data['id']; ?>);" class="wsh-btn" id="btn-like" style="width: 18px;">
                                                    <i class="bi bi-heart-fill text-dark fs-5"></i>
                                                </button>


                                                <button class="wsh-btn wsh-elevated-btn" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                                <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>" class="wsh-btn wsh-text-btn " id="btn-buy" style="color: black;font-family: Poppins;font-size: 14px;font-weight: 400;">Buy</a>


                                            </div>


                                        </div>
                                    </div>
                                <?php

                                }

                                ?>



                            </div>
                        </div>

                    </div>
                </div>



                <!-- products -->

        </div>
        <?php
        ?>

    <?php
            }
    ?>


    </div>
    </div>



    </div>
    </div>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img2/i1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img2/shopping.png" alt="">
            <h6>Online Oder</h6>
        </div>
        <div class="fe-box">
            <img src="img2/save-money.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img2/promotion.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img2/clothes.png" alt="">
            <h6>meny options</h6>
        </div>
        <div class="fe-box">
            <img src="img2/24-hours.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>
    <?php include "footer.php"; ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>


</body>

</html>