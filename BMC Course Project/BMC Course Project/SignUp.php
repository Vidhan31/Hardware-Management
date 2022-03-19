<?php
     $showAlert = false;  
     $existerr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 include 'partials/dbconnect.php';
 
 $name = $_POST["name"];
 $password = $_POST["password"];
 $cpassword = $_POST["cpassword"];
 $email = $_POST["email"];
 $Address = $_POST["Address"];
 $phonenumber = $_POST["phonenumber"];

 $var = "SELECT * FROM user WHERE user_email = '$email' ";

 $resvar = mysqli_query($conn, $var);

 $numrows = mysqli_num_rows($resvar);

 if($numrows == 0)
 { 

   
        $sql = "INSERT INTO `user` (`user_name`, `user_mobile`, `user_email`, `user_address`, `user_password`) VALUES ('$name', '$phonenumber', '$email', '$Address', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            $showAlert = true;
        }
        else{
            echo "Query Error !";
        }
   
 }
else
{
    $existerr = "Email  Already Used ! Try with Different Email.";
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMC - SignUp page</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">

    <!-- Required CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/barfiller.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/main.css">


</head>

<body>
    <div class="preloader">
        <span class="preloader-spin"></span>
    </div>
    <div class="signPcolor">



    <?php require 'partials/header.php' ?>
    <?php
   if($showAlert)
    {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>SignUp Successful!</strong> You should Login again For confirmation.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    if($existerr)
    {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> '. $existerr. '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    ?>
   

        <div>
            <div class="container d-flex justify-content-center">
                <div class="rowsign row my-5">
                    <div class="col-md-6 text-left text-white lcol">
                        <div class="greeting">
                            <h3>Welcome to <span class="txt">Bath & Sanitary Ware</span></h3>
                        </div>
                        <h6 class="mt-3">let's give your home some style...</h6>
                        <div class="footer">
                            <div class="socials d-flex flex-row justify-content-between text-white">
                                <div class="d-flex flex-row"><i class="fab fa-linkedin-in"></i><i class="fab fa-facebook-f"></i><i class="fab fa-twitter"></i></div> <span>Privacy
                                    Policy</span> <span>&copy; 2021 Company</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 rcol">
                        <!--  class="form-control" -->
                        <form name="signupform" class="sign-up"  method="POST" action="signup.php" onsubmit="return validateform()" ><br><br><br>
                            <h2 class="heading mb-4">Sign up</h2>
                            <div class="form-group fone mt-1"> <input class="textbox" type="text" id="name" name="name" placeholder="Name"> </div>
                            <div class="form-group fone mt-1"><input class="textbox" type="email" id="email" name="email" placeholder="Email"> </div>
                            <div class="form-group fone mt-1"><input class="textbox" type="password" id="password" name="password" placeholder="Password"></div>
                            <div class="form-group fone mt-1"><input class="textbox" type="password" id="cpassword" name="cpassword" placeholder="Re-enter Password"></div>
                                <div class="form-group fone mt-1"><input class="textbox" type="text" id="phonenumber" name="phonenumber" placeholder="Contact No:"> </div>
                                <div class="form-group fone mt-1"><textarea id="Address" rows="2" cols="17" name="Address" placeholder="Address" style="width: 100% ; font-size:16px"></textarea>
                                    <div class=" "><a href=""> <input class="btn-lg btn-success " name="submit" type="submit" value="Start now" id="submit"></a>
                                    </div>
                                </div>
                        </form>
                        <p class="exist mt-4">Existing user? <a href="LogIn.php"><span class="btn login-btn-signup-page">Log in</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    
    <?php require 'partials/footer.php' ?>



    </div>

    <!--Required JS files-->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/owl.carousel.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/jquery.barfiller.js"></script>
    <script src="assets/js/vendor/loopcounter.js"></script>
    <script src="assets/js/vendor/slicknav.min.js"></script>
    <script src="assets/js/active.js"></script>
    <script src="assets/js/signup.js"></script>

</body>

</html>