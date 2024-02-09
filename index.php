<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ModaLine</title>
    <link rel="icon" href="resourses/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img2/l1.png">

</head>

<body class="main-body">
<div class="background" style="position: absolute;top: 0;left: 0;width: 100%;min-height: 100vh;background-color: #4f4b4c; background-repeat:no-repeat;background-size: cover;z-index: -1;filter: blur(5px);"></div>
    <div class="container-fluid vh-100 d-flex justify-content-center">

        <div class="row align-content-center">

            <!--content -->

            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>

                    <!--signup box-->
                    
                    <div class="col-12 col-lg-6" id="SignUpBox">
                        <div class="row g-2">

                            <div class="" style="box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.50); background-color: #E4E4E4;width: 1280px;height: 834px;display: flex; position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);border-radius: 20px;">
                                <div class="" style="background-color:#E4E4E4; width: 640px;height: 834px;border-radius: 20px;">
                                    <div class="img-div-1" style="width: 617px;height: 807px;border-radius: 0px 186px;margin-top: 13.5px;justify-content: center;margin-left: auto;margin-right: auto;background-image: url(img2/2.jpg);">

                                    </div>
                                </div>
                                <!--img src="" alt="">-->

                                <div class="col-12 col-lg-6 form-div" style="background-color: #E4E4E4;width: 640px;height: 834px;display: flex;justify-content: center;border-radius: 20px;">
                                    <div class="form-div-1" style="width: 476px; height: 552px;margin-top: 140px;">
                                        <div class="row" style="font-size: 47px; font-weight: 900;font-family: Poppins;color: #000; justify-content: center;">ModaLine</div>

                                        <div class="col-12">
                                            <div class="title02 row " style=" font-size: 36px; font-weight: 600; justify-content: center;font-family: Poppins;color: #000;margin-top: 0px;">Create New Account.</div>
                                        </div>

                                        <div class="col-12 d-none" id="msgdiv">
                                            <div class="alert alert-danger" role="alert" id="msg">

                                            </div>
                                        </div>


                                        <div class="row-px-2" style="background-color: #E4E4E4;width: 476px;height: 140px; margin-top: 24px;">
                                            <!--email & password row-->

                                            <div class="col-12">
                                                <input class="form-control" type="text" placeholder="First Name" id="fname" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                            </div>

                                            <div class="col-12">
                                                <input class="form-control" type="text" placeholder="Last Name" id="lname" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                            </div>

                                            <div class="col-12">
                                                <input class="form-control" type="text" placeholder="Email" id="email" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                            </div>

                                            <div class="col-12">
                                                <input class="form-control" type="password" placeholder="password" id="password" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                            </div>




                                            <div class="mobil-n-Gender-div" style="width: 469px;height: 41px;display: flex;gap: 9px;margin-top: 12px;">

                                                <div class="col-6">
                                                    <label class="form-label" style="font-size: 16px; font-weight: 400;font-family: Poppins;">Mobile</label>
                                                    <input class="form-control" type="text" placeholder="0700000000" id="mobile" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins; " />

                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label" style="font-size: 16px; font-weight: 400;font-family: Poppins;">Gender</label>
                                                    <select class="form-control" id="gender" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins; ">
                                                        <option value="0">Select your Gender</option>
                                                        <?php
                                                        require "connection.php";

                                                        $rs = Database::search("SELECT * FROM `gender`");
                                                        $n = $rs->num_rows;

                                                        for ($x = 0; $x < $n; $x++) {
                                                            $d = $rs->fetch_assoc();

                                                        ?>

                                                            <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                                        <?php

                                                        }

                                                        ?>
                                                    </select>

                                                </div>

                                            </div>
                                            <!--email & password row-->

                                            <div class="col-12 col-lg-6 d-grid" style="margin-top: 55px;">

                                                <button class="btn btn-primary" onclick="signUp();" style="width:472px; height: 41px;border-radius: 10px;background-color: #594449;font-size: 16px; font-weight: 600;font-family: Poppins;color: #FFF;  ">Sign Up</button>

                                            </div>



                                            <div class="last-text" style="width: 266px; height: 24px; display: flex; justify-content: space-between;text-align: center;margin-left: 105px; margin-top: 22px;">

                                                <div class="last-text-1" style="font-size: 16px; font-weight: 600;color: #171717;width: 202px;font-family: Poppins;">Dont have and Account? </div>

                                                <div class=" col-12 col-lg-6 d-grid" style=" width: 64px; ">
                                                    <a class="" href="#" style="color: #594449;font-family: Poppins;font-size: 16px;font-weight: 600;" onclick="ChangeView();">Sign In</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--signup box-->

                <!-- signin box -->
                <div class="col-12 col-lg-6 d-none" id="SignInBox">
                    <div class="row g-2">

                        <div class="" style="box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.50); background-color: #E4E4E4;width: 1280px;height: 834px;display: flex; position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);border-radius: 20px;">
                            <div class="" style="background-color:#E4E4E4; width: 640px;height: 834px;border-radius: 20px;">
                                <div class="img-div-1" style="width: 617px;height: 807px;border-radius: 0px 186px;margin-top: 13.5px;justify-content: center;margin-left: auto;margin-right: auto;background-image: url(img2/22.jpg);">

                                </div>
                            </div>
                            <!--img src="" alt="">-->

                            <div class="" style="background-color: #E4E4E4;width: 640px;height: 834px;display: flex;justify-content: center;border-radius: 20px;">
                                <div class="form-div-1" style="background-color: #E4E4E4;width: 476px; height: 552px;margin-top: 140px;">
                                    <div class="row" style="font-size: 47px; font-weight: 900;font-family: Poppins;color: #000; justify-content: center;">ModaLine</div>
                                    <div class="row" style="font-size: 36px; font-weight: 600; justify-content: center;font-family: Poppins;color: #000;margin-top: 30px;">Sign in to your Account.</div>

                                    <div class="" style="background-color: #E4E4E4;width: 476px;height: 140px; margin-top: 100px;">
                                        <!--email & password row-->

                                        <?php
                                        $email = "";
                                        $password = "";

                                        if (isset($_COOKIE["email"])) {
                                            $email = $_COOKIE["email"];
                                        }

                                        if (isset($_COOKIE["password"])) {
                                            $password = $_COOKIE["password"];
                                        }
                                        ?>


                                        <div class="col-12">
                                            <input class="form-control" type="text" placeholder="Email" id="email2" value="<?php echo $email; ?>" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                        </div>

                                        <div class="col-12">
                                            <input class="form-control" type="password" placeholder="password" id="password2" value="<?php echo $password; ?>" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                        </div>
                                        <!--email & password row-->

                                        <!-- check box & fogt password-->
                                        <div class="col-12" style="display: flex;margin-top: 15px;">

                                            <div class="form-chek">

                                                <input class="form-check-input " type="checkbox" value="" id="rememberme">
                                                <label class="form-check-label" for="rememberme" style="width:120px;color: rgba(0, 0, 0, 0.60);font-family: Poppins;font-size: 16px;font-weight: 400;">
                                                    Remember me
                                                </label>

                                            </div>

                                            <div class="col-6 text-end" style="width: 167px; height: 24px;margin-left: 165px;">
                                                <a href="#" class="link-primary" onclick="forgotPassword();" style="text-decoration: none; font-size: 16px; color: rgba(0, 0, 0, 0.60);font-family: Poppins;font-weight: 400;">Forgotten Password?</a>
                                            </div>

                                        </div>
                                        <!-- check box & fogt password-->

                                        <div class="col-12 col-lg-6 d-grid" style="margin-top: 55px;">

                                            <button class="btn btn-primary" onclick="signin();" style="width:472px; height: 41px;border-radius: 10px;background-color: #594449;font-size: 16px; font-weight: 600;font-family: Poppins;color: #FFF;  ">Sign Up</button>

                                        </div>

                                        <div class="last-text" style="width: 266px; height: 24px; display: flex; justify-content: space-between;text-align: center;margin-left: 105px; margin-top: 34px;">
                                            <div class="last-text-1" style="font-size: 16px; font-weight: 600;color: #171717;width: 202px;font-family: Poppins;">Dont have and Account? </div>

                                            <div class="col-12 col-lg-6 d-grid" style=" width: 64px; ">
                                                <a href="#" class="" onclick="ChangeView();" style="color:  #594449;font-family: Poppins;font-size: 16px;font-weight: 600;">Sign up</a>
                                            </div>
                                            
                                        </div>

                                        <div class="col-12 col-lg-6 d-grid" style=" width: 200px;margin-left:200px;">
                                                <a href="adminSignIn.php"  style="color: #594449;font-family: Poppins;font-size: 16px;font-weight: 600;">Admin Log in</a>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- signin box -->
        </div>
    </div>
    <!--content -->
  <!-- modal -->
  <div class="modal" tabindex="-1" id="forgotPasswordModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Forgot Password?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="row g-3">

                                  <div class="col-6">
                                      <label class="form-label">New Password</label>
                                      <div class="input-group mb-3">
                                          <input type="password" class="form-control" id="np" />
                                          <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword();">
                                              <i class="bi bi-eye"></i>
                                          </button>
                                      </div>
                                  </div>

                                  <div class="col-6">
                                      <label class="form-label">Retype New Password</label>
                                      <div class="input-group mb-3">
                                          <input type="password" class="form-control" id="rnp" />
                                          <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">
                                              <i class="bi bi-eye"></i>
                                          </button>
                                      </div>
                                  </div>

                                  <div class="col-12">
                                      <label class="form-label">Verifiction Code</label>
                                      <input type="text" class="form-control" id="vc" />
                                  </div>

                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->
              
              <!-- footer -->

              <div class="col-12 d-none d-lg-block fixed-bottom">
                  <p class="text-center" style="color: #000;">&copy;2023 ModaLine.lk || ALL Rights Reserved</p>
              </div>

              <!--footer -->
    </div>

    </div>





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>