<?php
session_start();

if (!isset($_SESSION["loggedinc"]) || $_SESSION["loggedinc"] != true) {
    header("location: hardwareLogin.php");
    exit();
}
?>

<?php

include 'partials/dbconnect.php';

// Connecting to the Database
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bmc_sanitaryware";

// // Create a connection
// $conn = mysqli_connect($servername, $username, $password, $database);
// // Die if connection was not successful
// if (!$conn) {
//     die("Sorry we failed to connect: " . mysqli_connect_error());
// }

/*else{
    echo "Connection was successful<br>";
}*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">
    <!-- local CSS file-->
    <link rel="stylesheet" href="main.css">
    <!-- Icon Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7374cf5a2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!--Bootstrap link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <!--sidebar code starts here-->
    
    
    <?php require 'partials/clientsidebar.php' ?>

  
    <section class="home-section">

    <?php require 'partials/clientnav.php' ?>

        <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Number of Orders</div>
            <div class="number">
                <?php
                    $mysql = "SELECT order_id FROM orders ORDER BY order_id";
                    $result = mysqli_query($conn, $mysql);
                    $row = mysqli_num_rows($result);
                    echo $row;
                ?> 
            </div>
            
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Number of Users</div>
            <div class="number">
            <?php
                       
                     $mysql = $mysql = "SELECT user_id FROM user ORDER BY user_id";
                     $result = mysqli_query($conn, $mysql);
                     $row = mysqli_num_rows($result);
                     echo $row;
                ?> 
            </div>
           
          </div>
          <i><img src="project/images/totalcustomers.png" alt="customerpic"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">
            <?php
                   $sql = "SELECT SUM(order_price) FROM orders";
                   $result = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_array($result);              
                   echo "₹" . $row[0];                  
            ?> 
            </div>
            
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Stock</div>
            <div class="number">
            <?php
                   $sql = "SELECT SUM(quantity) FROM product";
                   $result = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_array($result);              
                   echo $row[0];                  
            ?> 
            </div>
          </div>
          <i style="float: right;"><img src="project/images/totalstock.png" alt="totalstockpic"></i>
        </div>
      </div>
            <div class="row gutters-sm" style="margin-left: 0px; margin-right: 0px;">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-decoration: underline;">My Profile</h4>
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://visualpharm.com/assets/314/Admin-595b40b65ba036ed117d36fe.svg" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <td><?php
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td>" .
                                            $row["client_name"] .
                                            "</td>";
                                    }
                                }
                                ?></td>
                                    <p class="text-secondary mb-1">Business Owner</p>
                                    <p class="text-muted font-size-sm">Pune, Maharashtra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--  <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Website</h6>
                                <span class="text-secondary">https://bathware.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@BathWare</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">@Bathware</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">Bathware</span>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td>" .
                                            $row["client_name"] .
                                            "</td>";
                                    }
                                }
                                ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td>" .
                                            $row["client_email"] .
                                            "</td>";
                                    }
                                }
                                ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<td>" .
                                            $row["client_mobile"] .
                                            "</td>";
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100" style="margin-top: 10px;">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><b
                                            class="material-icons text-info mr-2">Overview</b>
                                    </h6>
                                    <h4>Total Orders: <span>1000</span> </h4>
                                    <h4>Total Customers: <span>1000</span> </h4>
                                    <h4>Total Sales(in Rs.): <span>1000</span> </h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function () {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
            // search bar
            const searchFocus = document.getElementById('search-focus');
            const keys = [
                { keyCode: 'AltLeft', isTriggered: false },
                { keyCode: 'ControlLeft', isTriggered: false },
            ];

            window.addEventListener('keydown', (e) => {
                keys.forEach((obj) => {
                    if (obj.keyCode === e.code) {
                        obj.isTriggered = true;
                    }
                });

                const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

                if (shortcutTriggered) {
                    searchFocus.focus();
                }
            });

            window.addEventListener('keyup', (e) => {
                keys.forEach((obj) => {
                    if (obj.keyCode === e.code) {
                        obj.isTriggered = false;
                    }
                });
            });
  });
    </script>
</body>
</html>
