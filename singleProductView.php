<!DOCTYPE html>
<?php
session_start();

require "./connection.php";

if (isset($_GET["id"])) {
  $pid = $_GET["id"];

  $user = $_SESSION["u"];

  $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
    product.category_cat_id,product.model_has_brand_id,product.color_clr_id,product.status_status_id,
    product.condition_condition_id,product.users_email,model.model_name AS mname,
    brand.brand_name AS bname FROM `product` INNER JOIN `model_has_brand` ON 
    model_has_brand.id=product.model_has_brand_id INNER JOIN `brand` ON 
    brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id WHERE product.id='" . $pid . "'");

  $product_num = $product_rs->num_rows;
  if ($product_num == 1) {
    $product_data = $product_rs->fetch_assoc();
  
?>

  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Page | MODALINE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pp.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img2/l1.png">
    <link rel="stylesheet" href="product_card.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>

  <body>

   <!--HEDDRE-DIV-->

   <section id="header">
        <a href="home.php"><img src="img2/logo (2).png" class="logo" alt=""></a>




        <div>
          <ul id="navbar">
            <li><a href="home.php">Home</a></li>
            <!-- <li><a href="shop.php">Shop</a></li> -->
            <li><a href="addProduct.php">Add Product</a></li>
            <li><a href="watchlist.php">Watchlist</a></li>
            <li><a href="advancedSearch.php">Advanced</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="cart.php"><i class="bi bi-bag-check"></i></a></li>
            <li><a href="userProfile.php"><img style="size: 100px;margin-top:2px;" src="resourses/profile.svg" alt=""></></a></li>
          </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

      </section>


      <!--HEDDRE-DIV-->



    <?php
    $all_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='$pid'");
    $all_img_num = $all_img_rs->num_rows;
    ?>

    <div class="card-wrapper">
      <div class="card" >
        <!-- card left -->
        <div class="product-imgs" style="display: flex;">

      
<div class="img_divv" >
          <div class="img-display">
            <div class="img-showcase">
              <?php


              for ($i = 0; $i < $all_img_num; $i++) {
                $all_img_data = $all_img_rs->fetch_assoc();
              ?>
                <img src="<?php echo $all_img_data['img_path'] ?> " alt="shoe image">
              <?php
              }
              ?>
            </div>
          </div>
          <div class="img-select">
          <?php
    $all_img_rs2 = Database::search("SELECT * FROM `product_img` WHERE `product_id`='$pid'");
    $all_img_num2 = $all_img_rs2->num_rows;
    ?>
            <?php
            for ($l = 0; $l < $all_img_num2; $l++) {
              $all_img_data2 = $all_img_rs2->fetch_assoc();
            ?>
              <div class="img-item">
                <a href="#" data-id="<?php echo($l+1) ?>">
                <!-- <h5><?php echo $all_img_data2['img_path'] ?></h5> -->
                <img src="<?php echo $all_img_data2['img_path'] ?> " alt="shoe image">
                </a>
              </div>
            <?php
            }
            ?>

            
        </div>

      </div>
        <!-- card right -->
        <div class="product-content" >
          <h3 class="product-title"><?php echo $product_data["title"]; ?></h3>
          <div>
              <a href="home.php" class="product-link">visit MODALINE store</a>
            </div>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <?php

$price = $product_data["price"];
$add = ($price / 100) * 10;
$new_price = $price + $add;
$diff = $new_price - $price;
$percent = ($diff / $price) * 100;

?>
         <div class="product-price">
              <p class="last-price" style="color: black;">Old Price: <span>Rs<?php echo $price; ?>.00</span></p>
              <p class="new-price" style="color: black;">New Price: <span>Rs<?php echo $new_price;  ?> .00 (5%)</span></p>
            </div>

            <div class="product-detail">
              <h2 style="color: black;">about this item: </h2>
              <p style="color: black;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
              <p style="color: black;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
              <ul>
                <li>Color: <span>Black</span></li>
                <li><?php echo $product_data["qty"]; ?> Items Available<span> : in stock</span></li>
                <div>
                  <?php
                  $user_rs = Database::search("SELECT * FROM `users` WHERE 
                                                                `email`='" . $product_data["users_email"] . "'");
                  $user_data = $user_rs->fetch_assoc();
                  ?>
                  <li>Seller : <?php echo $user_data["fname"]; ?><span></span></li>
                </div>
                <li>Shipping Area: <span>All over the world</span></li>
                <li>Shipping Fee: <span>Free</span></li>
              </ul>
            </div>

            <div class="purchase-info">
              <input type="number" min="0" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />
              <button type="button" class="btn">
                Add to Cart <i class="fas fa-shopping-cart"></i>
              </button>
              <button class="btn " type="submit" id="payhere-payment" onclick="paynow(<?php echo $pid; ?>);">Pay Now</button>

            </div>

          <div class="social-links">
            <p>Share At: </p>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>

      
    </div>
    
    
</div>
<!-- Related_Items  -->
<div class="Related_Items">
        <div style="width: 100%;height: 530px;flex-shrink: 0;background: #D9D9D9;margin-left:auto;margin-right:auto;">
          <div class="text_div" style="width: 227px;height:48px;margin-left:auto;margin-right:auto;">
            <h2 style="color: #000;font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 700;line-height: normal;">Related Items</h2>
          </div>
          <hr style="width: 100%;height: 1px;background:#000;">

          <div class="col-12 bg-white" style="margin-top: 10px;margin-right:170px;">
                                <div class="row g-2" style="display: flex; ">

                                  
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
        </div>
      </div>
      </div>
      <!-- Related_Items -->
<!-- Related_Items -->

      <!-- Product Details -->

      <div class="Product_Details " style="margin-top: 21px;">
        <div style="width: 100%;height: 802px;flex-shrink: 0;margin-left:auto;margin-right:auto;">
          <div class="text_div" style="width: 1019px;height: 60px;flex-shrink: 0;background: #9E002D;margin-left:auto;margin-right:auto;">
            <h2 style="color:white;font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 700;line-height: normal;text-align: center;">Product Details</h2>
          </div>

          <div class="brand_Model" style="width: 1019px;height: 60px; display: flex;justify-content: space-between;margin-left:auto;margin-right:auto;margin-top: 76px; display: flex;">

            <div class="brand" style="width: 410px;height: 61px;flex-shrink: 0;background:#D9D9D9;display: flex;justify-content: space-between; text-align: center;">
              <div style="color: #000;font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 700;line-height: normal;">
                Brand :
              </div>
              <div style="width: 290px; color: rgba(0, 0, 0, 0.80);font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 500;line-height: normal; text-align: center;">
              Tommy Hilfiger
              </div>

            </div>

            <div class="Model" style="width: 410px;height: 61px;flex-shrink: 0;background:#D9D9D9;display: flex;justify-content: space-between; text-align: center;">
            <div style="color: #000;font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 700;line-height: normal;">
              Model :  
              </div>
              <div style="width: 290px; color: rgba(0, 0, 0, 0.80);font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 500;line-height: normal; text-align: center;">
             SLEEVE SHIRT
              </div>

            </div>


            </div>

           
<div class="text_div" style="width: 1019px;height: 60px;flex-shrink: 0;margin-left:auto;margin-right:auto;margin-top: 82px;">
            <h2 style="color: #000;font-family: Poppins;font-size: 32px;font-style: normal;font-weight: 700;line-height: normal;text-align: center;">Description </h2>
           

          </div>

          <div class="type_div" style="width: 1200px;height: 409px;flex-shrink: 0;background: #FBF7F7;margin-left:auto;margin-right:auto;margin-top:14px;">
          <textarea style="width: 1200px;height: 409px;color: #000;font-family: Poppins;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;text-align: center;" cols="60" rows="10" class="form-control" readonly><?php echo $product_data["description"]; ?></textarea>

</div>

          </div>
        </div>
        <script src="script.js"></script>
      </div>
      <!-- Product Details -->
  </body>
  <script src="pp.js"></script>
  <?php include "footer.php"; ?>
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script src="sing.js"></script>
    
  </html>

<?php
}else {
  ?> <script>
      alert("Something went wrong");
    </script> <?php
            }
          }


              ?>