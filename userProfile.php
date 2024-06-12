<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | MODALINE </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img2/l1.png">
</head>

<body style="background-color: #D9D9D9;">

    <div>

        <!--HEDDRE-DIV-->

        <section id="header">
            <a href="home.php"><img src="img2/logo (2).png" class="logo" alt=""></a>




            <div>
                <ul id="navbar">
                    <li><a href="home.php">Home</a></li>
                    <!-- <li><a href="shop.php">Shop</a></li> -->
                    <li><a href="addProduct.php">Add Product</a></li>
                    <li><a href="contact.php">Watchlist</a></li>
                    <li><a href="advancedSearch.php">Advanced</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="userProfile.php"><img style="size: 100px;margin-top:2px;width:20px;height:20px;" src="resourses/Male User.png" alt=""></></a></li>
                </ul>
            </div>

            <!-- <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div> -->

        </section>


        <!--HEDDRE-DIV-->

        <?php

        session_start();



        require "connection.php";

        if (isset($_SESSION["u"])) {

            $email = $_SESSION["u"]["email"];

            $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON  
                                    users.gender_id=gender.id WHERE `email`='" . $email . "'");

            $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `users_email`='" . $email . "'");

            $address_rs = Database::search("SELECT * FROM `users_has_address` INNER JOIN `city` ON  
                                    users_has_address.city_city_id=city.city_id INNER JOIN 
                                    `district` ON city.district_id=district.district_id 
                                    INNER JOIN `province` ON 
                                    district.province_province_id=province.province_id 
                                    WHERE `users_email`='" . $email . "'");

            $details_data = $details_rs->fetch_assoc();
            $image_data = $image_rs->fetch_assoc();
            $address_data = $address_rs->fetch_assoc();

        ?>
            <div style="margin-left: auto;margin-right:auto;width:400px;margin-top:20px;">
                <h4 class="font-weight-bold py-3 mb-4" style="text-align: center;color: #000;
font-family: Poppins;
font-size: 40px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: -0.35px;">
                    Account settings
                </h4>
            </div>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>

                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <?php

                                    if (empty($image_data["path"])) {
                                    ?>
                                        <img src="resourses/user.svg" class="rounded mt-5" style="width:150px;" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="<?php echo $image_data["path"]; ?>" class="" style="height: 150px;width: 150px;flex-shrink: 0;border-radius: 200px;" />
                                    <?php
                                    }

                                    ?>

                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" id="profileImage" class="account-settings-fileinput">
                                        </label> &nbsp;
                                        <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                        <br>
                                        <span class="fw-bold" style="display: flex;color: #3F3E3E;font-family: Poppins;font-size: 16px;"><?php echo $details_data["fname"] . " " . $details_data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50" style="color: #545353;font-family: Poppins;font-size: 16px;"><?php echo $email; ?></span>

                          
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Frist Name</label>
                                        <input type="text" id="fname" class="form-control" value="<?php echo $details_data["fname"]; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" id="lname" class="form-control" value="<?php echo $details_data["lname"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" id="email" class="form-control mb-1" value="<?php echo $details_data["email"]; ?>">
                                        <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="pw" class="form-control" value="<?php echo $details_data["password"]; ?>" aria-describedby="pwb" class="form-control">
                                        <span class="input-group-text" id="pwb" onclick="showPassword3();"><i class="bi bi-eye-fill"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                    </div>
                                    <?php

                                    if (empty($address_data["line1"])) {
                                    ?>
                                        <div class="form-group">
                                            <label class="form-label">Address Line 01</label>
                                            <input type="text" id="line1" class="form-control" value="Enter Address Line 01" />
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="form-group">
                                            <label class="form-label">Address Line 01</label>
                                            <input type="text" id="line1" class="form-control" value="<?php echo $address_data["line1"]; ?>" />
                                        </div>
                                    <?php
                                    }
                                    if (empty($address_data["line2"])) {
                                    ?>
                                        <div class="form-group">
                                            <label class="form-label">Address Line 01</label>
                                            <input type="text" id="line2" class="form-control" value="Enter Address Line 02" />
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="form-group">
                                            <label class="form-label">Address Line 02</label>
                                            <input type="text" id="line2" class="form-control" value="<?php echo $address_data["line2"]; ?>" />
                                        </div>
                                    <?php
                                    }

                                    $province_rs = Database::search("SELECT * FROM `province`");
                                    $district_rs = Database::search("SELECT * FROM `district`");
                                    $city_rs = Database::search("SELECT * FROM `city`");

                                    $province_num = $province_rs->num_rows;
                                    $district_num = $district_rs->num_rows;
                                    $city_num = $city_rs->num_rows;


                                    ?>
                                    <div class="form-group">
                                        <label class="form-label">Province</label>
                                        <select class="custom-select" id="province">>
                                            <option value="0">Select Province</option>
                                            <?php

                                            for ($x = 0; $x < $province_num; $x++) {
                                                $province_data = $province_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                                                if (!empty($address_data["province_province_id"])) {
                                                                                                                    if ($province_data["province_id"] == $address_data["province_province_id"]) {
                                                                                                                ?> selected <?php
                                                                                                                    }
                                                                                                                }
                                                                                ?>>
                                                    <?php echo $province_data["province_name"]; ?>
                                                </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>



                                </div>


                                <div class="form-group">
                                <label class="form-label">City</label>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>
                                                    <?php
                                                    
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["city_id"]; ?>" 
                                                        <?php
                                                            if (!empty($address_data["city_id"])) {
                                                                if ($city_data["city_id"] == $address_data["city_city_id"]) {
                                                            ?>selected<?php
                                                                    }
                                                                }
                                                                        ?>><?php echo $city_data["name_en"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                </div>




                                <hr class="border-light m-0">
                                <div class="card-body pb-2">

                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="mobile" class="form-control" value="<?php echo $details_data["mobile"]; ?>">
                                    </div>
                                    <div class="form-group">
                                    <label class="form-label">District</label>
                                                <select class="form-select" id="district">
                                                    <option value="0">Select District</option>
                                                    <?php

                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                                                        if (!empty($address_data["district_district_id"])) {
                                                                                                                            if ($district_data["district_id"] == $address_data["district_district_id"]) {
                                                                                                                        ?>selected<?php
                                                                                                                            }
                                                                                                                        }
                                                                        ?>><?php echo $district_data["district_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                    </div>
                                    <?php

                                    if (empty($address_data["postal_code"])) {
                                    ?>
                                        <div class="col-6">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" id="pc" class="form-control" placeholder="Enter Your Postal Code" />
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-6">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" id="pc" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" />
                                        </div>
                                    <?php
                                    }

                                    ?>
                                    <div class="form-group">
                                        <label class="form-label">Registered Date</label>
                                        <input type="text" class="form-control" value="<?php echo $details_data["joined_date"]; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" value="<?php echo $details_data["gender_name"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-social-links">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control" value="https://twitter.com/user">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" value="https://www.facebook.com/user">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Google+</label>
                                        <input type="text" class="form-control" value>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" value>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control" value="https://www.instagram.com/user">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-connections">
                                <div class="card-body">
                                    <button type="button" class="btn btn-twitter">Connect to
                                        <strong>Twitter</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <h5 class="mb-2">
                                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                                        <i class="ion ion-logo-google text-google"></i>
                                        You are connected to Google:
                                    </h5>
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-facebook">Connect to
                                        <strong>Facebook</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-instagram">Connect to
                                        <strong>Instagram</strong></button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-notifications">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Activity</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone comments on my article</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone answers on my forum
                                                thread</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone follows me</span>
                                        </label>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Application</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">News and announcements</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly product updates</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly blog digest</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <button onclick="updateProfile();" type="button" class="btn btn-primary">Save changes</button>&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
        <?php

        } else {
        }

        ?>




    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>


    <?php

    require "footer.php";

    ?>
</body>

</html>