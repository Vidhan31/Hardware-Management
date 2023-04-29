<?php

include 'partials/dbconnect.php';

?>


<header>
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-3 logo-column">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.jpg" alt="logo">
                </a>
            </div>
            <div class="col-6 col-sm-9 nav-column clearfix">

                <nav id="menu" class="d-none d-lg-block">
                    <ul>
                        <li class="current-menu-item"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="index.php#faq">FAQs</a></li>
                        
                        <li><a href="LogIn.php"> <button type="button" class="btn btn-outline-light me-2">Login</button></a></li>
                        <li><a href="SignUp.php"> <button type="button" class="btn btn-warning">Sign-up</button></a></li>
                        
                        <li><a href="logout.php"> <button type="button" class="btn btn-dark">Log Out</button></a></li>
                        <li><a class="navbar-brand" href="mycart.php"><img type="button" src="assets/img/cartlogo.jpg" alt="" width="40" height="40" class="d-inline-block align-text-top"></a></li>
                            <!-- <div class="col-6 col-sm-3 logo-column">
                                
                            </div> -->

                    </ul>
                </nav>

            </div>

        </div>
    </div>
</header>