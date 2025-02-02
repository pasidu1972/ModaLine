<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cart | MODALINE</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="img2/l1.png">

    </head>

    <body>
 <!--HEDDRE-DIV-->
        
 <section id="header">
        <a href="home.php"><img src="img2/logo (2).png"  class="logo" alt=""></a>


    

        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <!-- <li><a href="shop.php">Shop</a></li> -->
                <li><a  href="addProduct.php">Add Product</a></li>
                <li><a  href="watchlist.php">Watchlist</a></li>
                <li><a href="advancedSearch.php">Advanced</a></li>
                <li><a href="about.php">About</a></li>
                
                
                <li><a class="active" href="cart.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Shopping Bag.png" alt=""></></a></li>
                <li><a href="userProfile.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Male User.png" alt=""></></a></li>
            </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

    </section>
     
      
    <!--HEDDRE-DIV-->

        <div class="container-fluid">
            <div class="row">

               
                

                <div class="col-12 border border-1 border-primary rounded mb-3">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label fs-1 fw-bold"><i class="bi bi-cart4 fs-1 text-success"></i></label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Cart..." />
                                </div>
                                <div class="col-12 col-lg-2 mb-3 d-grid">
                                    <button class="btn btn-outline-primary" style="background-color: #203360;color:aliceblue;">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <?php
                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $user . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {
                        ?>
                            <!-- Empty View -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold">
                                            You have no items in your Cart yet.
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                        <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                            Start Shopping
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty View -->
                        <?php
                        } else {
                        ?>
                            <!-- products -->

                            <div class="col-12 col-lg-9">
                                <div class="row">

                                    <?php
                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE 
                                                    `id`='" . $cart_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                        $address_rs = Database::search("SELECT district.district_id AS `did` FROM 
                                    `users_has_address` INNER JOIN `city` ON
                                    users_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                                    city.district_id=district.district_id WHERE `users_email`='" . $user . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        $ship = 0;

                                        if (!$address_data["did"]) {
                                    ?>
                                            <script>
                                                alert("Update Your Profile First");
                                                window.location = "userProfile.php"
                                            </script>
                                        <?php
                                        }

                                        if ($address_data["did"] == 15) {
                                            $ship = $product_data["delivery_fee_colombo"];
                                            $shipping = $shipping + $product_data["delivery_fee_colombo"];
                                        } else {
                                            $ship = $product_data["delivery_fee_other"];
                                            $shipping = $shipping + $product_data["delivery_fee_other"];
                                        }

                                        $seller_rs = Database::search("SELECT * FROM `users` WHERE 
                                                                    `email`='" . $product_data["users_email"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["fname"] . " " . $seller_data["lname"];
                                        ?>
                                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5">Seller :</span>&nbsp;
                                                            <span class="fw-bold text-black fs-5"><?php echo $seller; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <!-- popup -->
                                                <div class="col-md-4">







                                                    <!-- image eka enne ne  -->

                                                    <?php

                                                    $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $cart_data["product_id"] . "'LIMIT 1");
                                                    $images_data = $images_rs->fetch_assoc();

                                                    ?>

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Description">
                                                        <img src="<?php echo $images_data["img_path"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;">
                                                    </span>





                                                </div>
                                                <!-- popup -->
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title"><?php echo $product_data["title"]; ?></h3>

                                                        <span class="fw-bold text-black-50">
                                                            <?php
                                                            $clr_rs = Database::search("SELECT * FROM `color` WHERE `clr_id`='" . $product_data["color_clr_id"] . "'");
                                                            $clr_data = $clr_rs->fetch_assoc();

                                                            ?>
                                                            <span class="fs-5 fw-bold text-black-50">Colour : <?php echo $clr_data["clr_name"]; ?></span>
                                                            &nbsp;&nbsp;
                                                            <?php ?>
                                                        </span> &nbsp;

                                                        &nbsp; <span class="fw-bold text-black-50">
                                                            <?php

                                                            $condition_rs = Database::search("SELECT * FROM `condition` WHERE `condition_id`='" . $product_data["condition_condition_id"] . "'");
                                                            $condition_data = $condition_rs->fetch_assoc();
                                                            ?>
                                                            <br />
                                                            <span class="fs-5 fw-bold text-black-50">Condition : <?php echo $condition_data["condition_name"]; ?></span>
                                                        </span>

                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;

                                                        <span class="fw-bold text-black fs-5">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                        <input type="number" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cardqtytext" value="1">
                                                        <br><br>
                                                        <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;



                                                        <!-- delevery fee other -->
                                                        <?php
                                                        $curr_city_rs = Database::search("SELECT * FROM `city` WHERE `city_id` IN (SELECT `city_city_id` FROM `users_has_address`  WHERE `users_email`='$user')");
                                                        $curr_city_data = $curr_city_rs->fetch_assoc();

                                                        if ($curr_city_data["city_id"] == 804) {
                                                        ?>
                                                            <span class="fw-bold text-black fs-5">Rs.<?php echo ($product_data["delivery_fee_colombo"]) ?>.00</span>
                                                        <?php

                                                        } else {

                                                        ?>
                                                            <span class="fw-bold text-black fs-5">Rs.<?php echo ($product_data["delivery_fee_other"]) ?>.00</span>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-success mb-2">Buy Now</a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="removeFromCart(<?php echo $cart_data['cart_id']; ?>);">Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs.<?php echo $total; ?>.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>



                                </div>
                            </div>

                            <!-- products -->

                            <!-- summary -->
                            <div class="col-12 col-lg-3">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summary</label>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-6 mb-3">
                                        <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                    </div>

                                    <div class="col-6 text-end mb-3">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                    </div>

                                    <div class="col-6">
                                        <span class="fs-6 fw-bold">Shipping</span>
                                    </div>

                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>

                                    <div class="col-6 mt-2">
                                        <span class="fs-4 fw-bold">Total</span>
                                    </div>

                                    <div class="col-6 mt-2 text-end">
                                        <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn  fs-5 fw-bold" style="background-color: #9A002C;color:aliceblue;">CHECKOUT</button>
                                    </div>

                                </div>
                            </div>
                            <!-- summary -->
                        <?php
                        }
                        ?>





                    </div>
                </div>

                <?php include "footer.php"; ?>

            </div>
        </div>


        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>

        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>
    </body>

    </html>
<?php

}

?>