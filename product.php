<?php
session_start();
include 'partials/dbconnect.php';

// if(isset($_POST['add_to_cart']))
// {
//     if(isset($_POST['cart']))
//     {

//     }
//     else
//     {
//         $session_array = array(
//             'id' => $_GET['id'] ,
//             "product_name" => $_POST['product_name'],
//             "p_category" => $_POST['catagory_name'],
//             "p_price" => $_POST['product_price'],
//             "quantity" => $_POST['quantity'],
//             "supplier" => $_POST['supplier_name'],
//             "p_color" => $_POST['product_color']
//         );

//         $_SESSION['cart'][] = $session_array;
//     }
 
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMC -Products Page</title>
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
    <div class="site">

    <?php require 'partials/header.php' ?><br>

        <div class="page-title sp " style="background-image: url(assets/img/productbg.jpg)">
            <div class="container text-center">
                <h2 class="h2color">Our Products</h2>
            </div>
        </div><br>
        <div class="portfolio-area sp  productPcolor">
            <div class="container">
                <div class="row">
                    <ul class="isotope-menu">
                        <li data-filter="*" class="active">Show All</li>
                        <li data-filter=".Basin">Basin</li>
                        <li data-filter=".Basin_Faucets">Basin Faucets</li>
                        <li data-filter=".Toilet_Seats">Toilet Seats</li>
                        <li data-filter=".BathTubs">BathTubs</li>
                        <li data-filter=".Commercial_Products">Commercial Products</li>
                        <li data-filter=".Showering">Showering</li>
                    </ul>
                </div>
                <div class="row portfolio-isotope"> 
                    
                <?php
                $query = "SELECT * FROM product ";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result))
                {?>

                    <div class="single-portfolio col-md-4 <?=$row['category_name'] ?> ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/<?=$row['product_img']?>.jpg" alt="product images">  <!-- <img src="assets/img/<?=$row['product_img'] ?>" alt="product images"> -->
                                </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <!-- <li><button style="width: 55px; height:55px;" class="fa fa-cart-plus cart_icon" aria-hidden="true" onclick="add_to_cart('<=$row['product_id'] ?>')"></button></li> -->
                                    
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href=""><?=$row['supplier_name'] ?></a></h3>
                                <p><?=$row['product_id']?>=<?=$row['product_name'] ?></p>
                                <p>Color: <?=$row['product_color'] ?></p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> ₹ <?=$row['product_price'] ?></li>
                                </ul>
                                <?php
                                if(isset($_SESSION['loggedin']))
                                {

                                ?>
                                <form method="POST" action="mycart.php">
                                <input type="hidden" name="pid" value="<?=$row['product_id']?>">
                                <input type="hidden" name="pname" value="<?=$row['product_name'] ?>">
                                <input type="hidden" name="pcol" value="<?=$row['product_color'] ?>">
                                <input type="hidden" name="ppriz" value="<?=$row['product_price'] ?>">
                                <input type="hidden" name="pcat" value="<?=$row['category_name'] ?>">
                                <input type="hidden" name="supplier" value="<?=$row['supplier_name'] ?>">

                                <input name="qty" type="number" name="product_quantity" id="qty" value="1" min="1" class="form-control">
                                <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add To Cart">
                                <!-- <ul> -->
                                <!-- <select class="select" id="qty<=$row['product_id'] ?>"  ><option value="0">Quantity</option><php for($i=1;$i<20;$i++){ echo "<option>$i</option>";} ?></select> -->
                                 <!-- </ul> -->
                                </form>
                                <?php
                                }
                                else
                                {?>
                                    <a class="btn btn-danger" href="login.php" data-toggle="model" data-target="login.php">Log In to Buy</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    


                <?php }

                ?>

                    


                
                </div>
                
                    <!-- <div class="single-portfolio col-md-4 Basin ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/basin2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Veil</a></h3>
                                <p>Vessel Without Faucet Hole</p>
                                <p>Color: Inner White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.17,500.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4  Basin ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/basin3.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Kankara</a></h3>
                                <p>Vessel With Single Faucet Hole</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.13,250.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4  Basin">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/basin4.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Memoirs </a></h3>
                                <p>Pedestal Lavatory With Classic Design And Single Faucet Hole</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.30,770.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Basin Basin_Faucets Commercial_Products">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/basin5.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Forefront </a></h3>
                                <p>Semi-recessed Lavatory With Single Faucet Hole</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.17,800.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Basin_Faucets ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/fluset1.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Taut </a></h3>
                                <p>Bath Spout Without Diverter</p>
                                <p>Color: Polished Chrome</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.2,320.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Basin_Faucets ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/fluset2.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Components </a></h3>
                                <p>Industrial Handles</p>
                                <p>Color: Polished Chrome</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.23,00.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Basin_Faucets ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/fluset4.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Refinia </a></h3>
                                <p>Single Control Lavatory Faucet </p>
                                <p>Color: Polished Chrome</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.17,560.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Basin_Faucets ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/fluset5.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Aleo+™</a></h3>
                                <p>Wall Mount Single-control Basin Faucet Trim+valve </p>
                                <p>Color: Brushed Bronze</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.17,990.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Toilet_Seats ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/toilet_seat1.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Veil™ </a></h3>
                                <p>Wall Hung Toilet With C3-230 Cleansing Seat</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.110,500.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Toilet_Seats ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/toilet_seat2.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Patio™ </a></h3>
                                <p>Wall Hung Toilet With Quiet-close™ Seat And Cover</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.9,540.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Toilet_Seats Commercial_Products ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/toilet_seat3.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Adair </a></h3>
                                <p>One-piece Skirted Toilet 305 With Seat Cover</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.19,610.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Toilet_Seats ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/toilet_seat4.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Span </a></h3>
                                <p>Square Wh Toilet W/seat</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.11,500.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Toilet_Seats ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/toilet_seat5.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Veil </a></h3>
                                <p>Intelligent One-piece Toilet</p>
                                <p>Color: White</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.605,000.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 BathTubs ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/bathtub1.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Ove™ </a></h3>
                                <p>1.7m Drop-in Acrylic BathTub</p>
                                <p>Color: White With Orange Bath Pillow</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.42,988.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 BathTubs ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/bathtub2.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Evok™</a></h3>
                                <p>Round Drop-in BathTub</p>
                                <p>Color: Pure White </p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.45,320.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 BathTubs ">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/bathtub3.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Duo™ </a></h3>
                                <p>Acrylic Drop-in Bathtub</p>
                                <p>Color: Pure White </p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.32,395.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Commercial_Products">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/commertial1.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Span </a></h3>
                                <p>Round Urinal With Rear Inlet</p>
                                <p>Color: White </p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.13,780.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Commercial_Products Basin_Faucets">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/commertial2.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">July </a></h3>
                                <p>Soft-press Auto Closing Faucet</p>
                                <p>Color: Polished Chrome</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.3,570.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Commercial_Products">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/commertial3.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Bardon™ </a></h3>
                                <p>Urinal With Rear Inlet 0.5l With Accuflush</p>
                                <p>Color: White </p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.32,230.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Showering">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/showering1.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Beitou </a></h3>
                                <p>Wall Mount Showerhead</p>
                                <p>Color: POLISHED CHROME</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.56,100.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Showering">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/showering2.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Coralais®</a></h3>
                                <p>Showerhead</p>
                                <p>Color: POLISHED CHROME</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.1,300.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Showering">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/showering3.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Artifacts™ </a></h3>
                                <p>2.0 Gpm Single-function Handshower</p>
                                <p>Color: POLISHED CHROME</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize"> Rs.7,500.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                    <div class="single-portfolio col-md-4 Showering">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/showering4.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Awaken </a></h3>
                                <p>254mm Rainhead</p>
                                <p>Color: Matte Black</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize">Rs.21,850.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4 Showering">
                        <div class="inner category mb-10">
                            <div class="htcatthumb"> <a href="#"> <img src="assets/img/showering5.jpg"
                                        alt="product images"> </a>
                            </div>
                            <div class="frhoverinfo">
                                <ul class="productaction">
                                    <li><a href=""><img src="assets/img/like.jpg" height="30" width="30"></a></li>
                                    <li><a href="#"><img src="assets/img/cart.jpg" height="30" width="30"></a></li>
                                </ul>
                            </div>
                            <div class="frproductinner innerposition">
                                <h3><a href="">Taut</a></h3>
                                <p>Bath Spout With Diverter</p>
                                <p>Color: POLISHED CHROME</p>
                                <ul class="frproprize text-left ml-text">
                                    <li class="oldprize">Rs.3,240.00</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- <script>
            function add_to_cart(id)
            {
                var qty=jQuery('#qty'+id).val();

                alert(qty);
            }
        </script> -->
    
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