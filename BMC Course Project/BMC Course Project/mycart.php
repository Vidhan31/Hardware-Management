<?php

session_start();
include 'partials/dbconnect.php';

$user_id = $_SESSION['id'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
} else {
    if (isset($_POST['add_to_cart'])) {
        $pid = $_POST['pid'];
        $price = $_POST['ppriz'];
        $category = $_POST['pcat'];
        $qty = $_POST['qty'];
        $pname = $_POST['pname'];
        $color = $_POST['pcol'];
        $supplier = $_POST['supplier'];
        $user_id = $_SESSION['id'];
        $order_priz = $qty * $price;

        // $sel = "SELECT* FROM orders WHERE product_id='$pid' AND user_id='$user_id";
        // $ss = $conn->query($sel);
        // if ($ss->num_rows > 0) {
        //     while ($row = $ss->fetch_assoc()) {
        //         $fqty = $row['order_quantity'] + $qty;
        //         $order_id = $row['user_id'];
        //         $upt = "UPDATE orders SET order_quantity='$qty' WHERE order_id='$order_id'";
        //         $conn->query($upt);
        //     }
        // } else {

        $insert = "INSERT INTO orders SET user_id='$user_id',product_id='$pid',order_price='$order_priz',order_quantity='$qty' ";
        $conn->query($insert);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Cart !</title>
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

    <?php require 'partials/header.php' ?>
    <h1 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">My Cart !</h1>
    <div class="mycartp">
        <div class="container "><br>
            <div class="cartimg">
                <img src="assets/img/mycartimg.png" style=" margin-left : 0%">
            </div>
            <table class="table table-hover table-dark table-striped mycart-table">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price/Unit</th>
                    <th>Order Status</th>
                    <th>Total Price</th>
                </tr>

                <?php
                // $orders = "SELECT * FROM orders  WHERE user_id='$user_id' ";

                $resc = "SELECT product.product_name,product.supplier_name,product.product_color,product.category_name,product.product_price,orders.order_quantity,orders.order_status,orders.order_price from orders join product on orders.product_id=product.product_id where orders.user_id='$user_id';
                ";


                $all = mysqli_query($conn, $resc);

                while ($row = mysqli_fetch_array($all)) { ?>
                    <tr>
                        <td></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['supplier_name'] ?></td>
                        <td><?= $row['product_color'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td><?= $row['order_quantity'] ?></td>
                        <td><?= $row['product_price'] ?></td>
                        <td><?= $row['order_status'] ?></td>
                        <td><?= $row['order_price'] ?></td>
                    <?php }

                    ?>

                    </tr>
            </table>

        </div>
    </div>

    <?php require 'partials/footer.php' ?>

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