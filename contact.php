
<?php
     $Showres = false;  

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 include 'partials/dbconnect.php';
 
 $name = $_POST["name"];
 $subject = $_POST["subject"];
 $femail = $_POST["email"];
 $comment = $_POST["comment"];
 $feed = "INSERT INTO `feedback` (`name`, `subject`, `email`, `comment`) VALUES ('$name', '$subject', '$femail', '$comment' );";

 $addf= mysqli_query($conn, $feed);

 if($addf)
 {
     $Showres = true;
 }
 else{
    echo "Query Error !";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMC - Contact</title>
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
    <div class="site ">



    <?php require 'partials/header.php' ?><br>

    <?php
   if($Showres)
    {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Feedback Submitted!</strong> Thank You For Sharing Your Thoughts.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>

        <div class="page-title sp" style="background-image: url(assets/img/contactbg.jpg)">
            <div class="container text-center">
                <h2>Conta<span class="text-dark"> ct Us</span></h2>
            </div>
        </div><br>
        <div class="contact-area sp contactPcolor">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 contact-info">
                        <div class="single-info">
                            <h5>Contact Number</h5>
                            <h6>Pushpak Kumar</h6>
                            <p>+(91) 9999291243</p>
                            <h6>Saumya Kumar</h6>
                            <p>+(91) 7011922546</p>
                        </div>
                        <div class="single-info">
                            <h5>Email</h5>
                            <p>babamarketingcompany@gmail.com</p>
                        </div>
                        <div class="single-info">
                            <h5>Address</h5>
                            <h6>Bhagwati Plaza</h6>
                            <p>73, New Arya Nagar <br>Gaziabad, UttarPradesh <br>Pincode: 201009</p>
                            
                        </div>
                        <div class="single-info">
                            <h5>Social</h5>
                            <p>
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-linkedin"></a>
                                <a href="#" class="fa fa-pinterest"></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form action="contact.php" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="comment" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <input class="button" name="submit" id="submit" type="submit" value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="google-map" id="locate">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.3452542334476!2d77.42290521458754!3d28.67931708871388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf1686d8aaf0d%3A0x28f4763e3c9dc24d!2sBaba%20Marketing%20Company!5e0!3m2!1sen!2sin!4v1645953313531!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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