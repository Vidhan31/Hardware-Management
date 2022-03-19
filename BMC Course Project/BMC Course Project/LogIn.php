
<?php
     $login = false;  
     $showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 include 'partials/dbconnect.php';
 
 $password = $_POST["password"];
 $email = $_POST["email"];
 
 $var = "SELECT * FROM user WHERE user_email= '$email' AND  user_password= '$password' ";

        $result =$conn->query($var);
    // $num= mysqli_num_rows($result);
        if($result->num_rows> 0)
        {
            $login = true;
            while($row=$result->fetch_assoc())
            {
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['user_name']=$row['user_name'];
            header("location: index.php");
            }
        }
        else{
            $showAlert = "Invalid Creadentials !";
        }
   
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMC -LogIn Page</title>
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
    <div class="logPcolor">

<?php

//     if($login)
//     {
//     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//     <strong>LogIn Successful!</strong> 
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }

    if($showAlert)
    {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning !</strong> '.$showAlert.' .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

?>

    <?php require 'partials/header.php' ?>

        <div class="containerlogin px-4 py-5 mx-auto">
            <div class="card card0">
                <div class="d-flex flex-lg-row flex-column-reverse">
                    <div class="card card1">
                        <div class="row justify-content-center my-auto">
                            <div class="col-md-8 col-10 my-5">
                                <div class="row justify-content-center px-3 mb-3"> <img id="logo" src="assets/img/logo.png"> </div><br><br><br>
                                <h6 class="msg-info">Please login to your account</h6>
                                <form name="loginform" class="log-in"  method="POST"  onsubmit="" >
                                <div class="form-group"> <label class="form-control-label text-muted">Username</label> <input type="email" id="email" name="email" placeholder="Email id" class="form-control"> </div>
                                <div class="form-group"> <label class="form-control-label text-muted">Password</label> <input type="password" id="password" name="password" placeholder="Password" class="form-control"> </div>
                                <div class="row justify-content-center my-3 px-3"> <a href=""><button class="btn-login btn-lg btn-color">Log In</button></a> </div>
                                <div class="row justify-content-center my-2"> <a href="hardwareLogin.php"><small class="text-muted">Cliek Here for Admin LogIn...</small></a> </div>
                                </form>
                            </div>
                        </div>
                        <div class="bottom text-center mb-5">
                            <p class="sm-text mx-auto mb-3">Don't have an account?<a href="SignUp.php" ><button class="btn btn-white ml-2">Create new</button></a></p>
                        </div>
                    </div>
                    <div class="card card2">
                        <img src="assets/img/loginbg.jpg">
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

</body>

</html>