<?php
session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>
  <head>
 
  
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="img2/l1.png">
    <title>Advanced Search | MODALINE</title>
    
  </head>
  <body>

 <!--HEDDRE-DIV-->

 <section id="header">
        <a href="home.php"><img src="img2/logo (2).png" class="logo" alt=""></a>




        <div>
            <ul id="navbar">
                <li><a  href="home.php">Home</a></li>
                <!-- <li><a href="shop.php">Shop</a></li> -->
                <li><a href="addProduct.php">Add Product</a></li>
                <li><a href="watchlist.php">Watchlist</a></li>
                <li><a class="active" href="advancedSearch.php">Advanced</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="cart.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Shopping Bag.png" alt=""></></a></li>
                
            </ul>
        </div>

        <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

    </section>


    <!--HEDDRE-DIV-->

    <div class="s010" style="background-color: rgb(253, 239, 239);" >
      <form>
        <div class="inner-form" style="margin-left: auto;margin-right: auto;">
          <div class="basic-search">
            <div class="input-field">
              <input id="t" type="text" class="form-control" placeholder="Type Keywords" />
              <a href="#"><div class="icon-wrap" >
                <svg xmlns="http://www.w3.org/2000/svg" class=""  width="24" height="24" viewBox="0 0 24 24" >
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" ></path>
                </svg>
              </div></a>
            </div>
          </div>
          <div class="advance-search">
            <span class="desc" style="font-family: Poppins;font-size: 36px; font-weight: 600;">ADVANCED SEARCH</span>
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                  <select  class="form-select" id="c1">
                    <option placeholder="" value="0">Select Category</option>
                    <?php
                                            $category_rs = Database::search("SELECT * FROM `category`");
                                            $category_num = $category_rs->num_rows;

                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $category_data["cat_id"] ?>"><?php echo $category_data["cat_name"] ?></option>
                                            <?php
                                            }
                                            ?>

                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select class="form-select" id="b1">
                    <option placeholder="" value="0">Select Brand</option>
                    <?php
                                            $brand_rs = Database::search("SELECT * FROM `brand`");
                                            $brand_num = $brand_rs->num_rows;

                                            for ($x = 0; $x < $brand_num; $x++) {
                                                $brand_data = $brand_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $brand_data["brand_id"] ?>"><?php echo $brand_data["brand_name"] ?></option>
                                            <?php
                                            }
                                            ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select  class="form-select" id="m">
                    <option placeholder="" value="0">Select Model</option>
                    <?php
                                            $model_rs = Database::search("SELECT * FROM `model`");
                                            $model_num = $model_rs->num_rows;

                                            for ($x = 0; $x < $model_num; $x++) {
                                                $model_data = $model_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $model_data["model_id"] ?>"><?php echo $model_data["model_name"] ?></option>
                                            <?php
                                            }
                                            ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select class="form-select" id="c2">
                    <option placeholder="" value="0">Select Condition</option>
                    <?php
                                            $condition_rs = Database::search("SELECT * FROM `condition`");
                                            $condition_num = $condition_rs->num_rows;

                                            for ($x = 0; $x < $condition_num; $x++) {
                                                $condition_data = $condition_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $condition_data["condition_id"] ?>"><?php echo $condition_data["condition_name"] ?></option>
                                            <?php
                                            }
                                            ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select class="form-select" id="c3">
                    <option placeholder="" value="0">Select Colour</option>
                    <?php
                                            $color_rs = Database::search("SELECT * FROM `color`");
                                            $color_num = $color_rs->num_rows;

                                            for ($x = 0; $x < $color_num; $x++) {
                                                $color_data = $color_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $color_data["clr_id"] ?>"><?php echo $color_data["clr_name"] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select id="s" name="choices-single-defaul">
                    <option placeholder="" value="0">SORT BY</option>
                    <option placeholder="" value="1">PRICE LOW TO HIGH</option>
                    <option placeholder="" value="2">PRICE HIGH TO LOW</option>
                    <option placeholder="" value="3">QUANTITY LOW TO HIGH</option>
                    <option placeholder="" value="4">QUANTITY HIGH TO LOW</option>
                    
                  </select>
                </div>
              </div>

              <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price From..." id="pf" />
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price To..." id="pt" />
                                    </div>


            </div>

            

            <div class="row third">
              <div class="input-field">
                <div class="result-count">
                  <span>108 </span>results</div>
                <div class="group-btn">

                  <a href="advancedSearch.php"><button class="btn-delete" id="">RESET</button></a>
                  
                 
                  <button class="btn-search"  onclick="advancedSearch(0);">SEARCH</button>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="offset-lg-2 col-12 col-lg-8 bg-body rounded mb-3 " style=" margin-top: 20px; box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);border-radius: 10px;width:100%;margin-left: auto;margin-right: auto;">
                <div class="row">
                    <div class="offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row" id="view_area">
                            <div class="offset-5 col-2 mt-5">
                                <span class="fw-bold text-black-50"><i class="bi bi-search h1" style="font-size: 100px;"></i></span>
                            </div>
                            <div class="offset-3 col-6 mt-3 mb-5">
                                <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      </form>


      
    </div>
    
    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
  </body>
</html>
