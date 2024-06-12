<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Watchlist | MODALINE</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="img2/l1.png">
    </head>

    <body style="background-color: #D9D9D9;">

        <!--HEADER-DIV-->

        <section id="header">
            <a href="home.php"><img src="img2/logo (2).png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="addProduct.php">Add Product</a></li>
                    <li><a class="active" href="watchlist.php">Watchlist</a></li>
                    <li><a href="advancedSearch.php">Advanced</a></li>
                    <li><a href="cart.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Shopping Bag.png" alt=""></a></li>
                    <li><a href="userProfile.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Male User.png" alt=""></a></li>
                </ul>
            </div>

        </section>

        <!--HEADER-DIV-->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 border border-1 border-primary rounded mb-2">
                        <div class="col-12" style="width:300px;margin-left:auto;margin-right:auto;">
                            <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                                </div>
                                <div class="col-12 col-lg-2 mb-3 d-grid">
                                    <button class="btn btn-primary" style="background-color: #9A002C;color:aliceblue;">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <?php
                        $watchlist_rs = Database::search("SELECT * FROM watchlist WHERE users_email='" . $_SESSION["u"]["email"] . "'");
                        $watchlist_num = $watchlist_rs->num_rows;

                        if ($watchlist_num == 0) {
                        ?>
                            <!-- empty view -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyView"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                        <a href="home.php" class="btn btn-warning fs-3 fw-bold">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                            <!-- empty view -->
                        <?php
                        } else {
                        ?>
                            <!-- have products -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <?php
                                    for ($x = 0; $x < $watchlist_num; $x++) {
                                        $watch_data = $watchlist_rs->fetch_assoc();
                                        $watch_item_rs = Database::search("SELECT * FROM product WHERE id='" . $watch_data["product_id"] . "'");
                                        $watch_item_data = $watch_item_rs->fetch_assoc();
                                    ?>
                                        <div class="card mb-3 mx-0 mx-lg-2 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <?php
                                                    $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $watch_data["product_id"] . "'LIMIT 1");
                                                    $images_data = $images_rs->fetch_assoc();
                                                    ?>
                                                    <img src="<?php echo $images_data["img_path"]; ?>" class="img-fluid rounded-start" style="height: 100%;width:100%;" />
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $watch_item_data["title"]; ?></h5>
                                                        <?php
                                                        $clr_rs = Database::search("SELECT * FROM `color` WHERE `clr_id`='" . $watch_item_data["color_clr_id"] . "'");
                                                        $clr_data = $clr_rs->fetch_assoc();
                                                        ?>
                                                        <span class="fs-5 fw-bold text-black-50">Colour : <?php echo $clr_data["clr_name"]; ?></span>
                                                        <br />
                                                        <?php
                                                        $condition_rs = Database::search("SELECT * FROM `condition` WHERE `condition_id`='" . $watch_item_data["condition_condition_id"] . "'");
                                                        $condition_data = $condition_rs->fetch_assoc();
                                                        ?>
                                                        <span class="fs-5 fw-bold text-black-50">Condition : <?php echo $condition_data["condition_name"]; ?></span>
                                                        <br />
                                                        <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                        <span class="fs-5 fw-bold text-black">Rs. <?php echo $watch_item_data["price"]; ?> .00</span>
                                                        <br />
                                                        <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;&nbsp;
                                                        <span class="fs-5 fw-bold text-black"><?php echo $watch_item_data["qty"]; ?> Items available</span>
                                                        <br />
                                                        <span class="fs-5 fw-bold text-black-50">Seller :</span>&nbsp;&nbsp;
                                                        <?php
                                                        $p_seller_rs = Database::search("SELECT fname, lname FROM users WHERE email IN (SELECT users_email FROM product WHERE id='" . $watch_data["product_id"] . "')");
                                                        $p_seller_data = $p_seller_rs->fetch_assoc();
                                                        ?>
                                                        <span class="fs-5 fw-bold text-black"><?php echo ($p_seller_data["fname"] . " " . $p_seller_data["lname"]) ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-5">
                                                    <div class="card-body d-lg-grid">
                                                        <a href="<?php echo "singleProductView.php?id=" . ($watch_item_data["id"]); ?>" class="col-12 btn btn-success mb-2">Buy Now</a>
                                                        <a href="" class="btn btn-outline-warning mb-2">Add to Cart</a>
                                                        <a href="#" class="btn btn-outline-danger" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- have products -->
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: home.php");
}
?>
