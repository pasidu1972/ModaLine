<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | zard</title>
    <link rel="icon" href="resourses/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resourses/zarad.svg">

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">

        <div class="row align-content-center">

            <!--content -->

            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>
                    <!-- signin box -->

                    <div class="col-12 col-lg-6 d-none" id="SignInBox">
                        <div class="row g-2">

                            <div class="container-md">
                                <div class="" style="background-color: #E4E4E4;width: 1280px;height: 834px;display: flex; position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);border-radius: 20px;">
                                    <div class="" style="background-color:#E4E4E4; width: 640px;height: 834px;border-radius: 20px;">
                                        <div class="img-div-1" style="width: 617px;height: 807px;border-radius: 0px 186px;margin-top: 13.5px;justify-content: center; background-color: aliceblue;margin-left: auto;margin-right: auto;">

                                        </div>
                                    </div>
                                    <!--img src="" alt="">-->

                                    <div class="" style="background-color: #E4E4E4;width: 640px;height: 834px;display: flex;justify-content: center;border-radius: 20px;">
                                        <div class="form-div-1" style="background-color: #E4E4E4;width: 476px; height: 552px;margin-top: 140px;">
                                            <div class="row" style="font-size: 47px; font-weight: 900;font-family: Poppins;color: #000; justify-content: center;">zarad</div>
                                            <div class="row" style="font-size: 36px; font-weight: 600; justify-content: center;font-family: Poppins;color: #000;margin-top: 30px;">Sign in to your Account.</div>

                                            <div class="" style="background-color: #E4E4E4;width: 476px;height: 140px; margin-top: 100px;">
                                                <!--email & password row-->
                                                <div class="col-12">
                                                    <input class="form-control" type="text" placeholder="Email" id="email" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                                </div>

                                                <div class="col-12">
                                                    <input class="form-control" type="password" placeholder="password" id="password" style="width:100%; height: 41px;border-radius: 10px;background-color:#ffffff;font-size: 16px; font-weight: 400;font-family: Poppins;margin-top: 12px; ">
                                                </div>
                                                <!--email & password row-->

                                                <!-- check box & fogt password-->
                                                <div class="form-check" style="display: flex;margin-top: 15px;">

                                                    <div class="form-chek-1">

                                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault" style="width:120px;color: rgba(0, 0, 0, 0.60);font-family: Poppins;font-size: 16px;font-weight: 400;">
                                                            Remember me
                                                        </label>

                                                    </div>
                                                    <div class="fogt-password-link" style="width: 167px; height: 24px;margin-left: 165px;">
                                                        <a href="#" style="text-decoration: none; font-size: 16px; color: rgba(0, 0, 0, 0.60);font-family: Poppins;font-weight: 400;">Forgotten Password?</a>
                                                    </div>
                                                </div>
                                                <!-- check box & fogt password-->

                                                <div class=" sign-btn" style="margin-top: 50px;">

                                                    <button style="width:472px; height: 41px;border-radius: 10px;background-color:#9E002D;font-size: 16px; font-weight: 600;font-family: Poppins;color: #FFF; ">Sign in</button>
                                                </div>

                                                <div class="last-text" style="width: 266px; height: 24px; display: flex; justify-content: space-between;text-align: center;margin-left: 105px; margin-top: 34px;">
                                                    <div class="last-text-1" style="font-size: 16px; font-weight: 600;color: #171717;width: 202px;font-family: Poppins;">Dont have and Account? </div>
                                                    <div class=" last-text-2-signUp" style=" width: 64px; ">
                                                        <a href="#" style="color: #8D0029;font-family: Poppins;font-size: 16px;font-weight: 600;">Sign up</a>
                                                    </div>
                                                </div>

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

    </div>

    </div>





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>