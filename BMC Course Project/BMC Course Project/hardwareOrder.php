<?php
session_start();

if (!isset($_SESSION["loggedinc"]) || $_SESSION["loggedinc"] != true) {
    header("location: hardwareLogin.php");
    exit();
}
?>

<?php
// // Connecting to the Database
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
include 'partials/dbconnect.php';

/*else{
echo "Connection was successful<br>";
}*/
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["snoEdit"])) {
        $sno = $_POST["snoEdit"];
        $orderedstatus = $_POST["order_status"];
        $orderedpaymentstatus = $_POST["order_payment_status"];
        $sql = "UPDATE orders SET order_status = '$orderedstatus' , order_payment_status = '$orderedpaymentstatus' WHERE `orders`.`order_id` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong> The record has been updated successfully
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Oops!</strong> The record was not updated successfully
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>" . mysqli_error($conn);
        }
    }
} ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">
    <!-- local CSS file-->
    <link rel="stylesheet" href="main.css">
    <!--Table refresh-->
    <script src="extensions/auto-refresh/bootstrap-table-auto-refresh.js"></script>
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
</head>

<body>
    <!--sidebar code starts here-->
        
    
    <?php require 'partials/clientsidebar.php' ?>

  
    <section class="home-section">
        
    <?php require 'partials/clientnav.php' ?>
 
        <div class="home-content">
                    <div style="margin-left: 20px; margin-right: 20px;">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Products ID</th>
                            <th>Total Cost</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php
                    $sql = "SELECT * FROM orders";
                    $result = mysqli_query($conn, $sql);
                    $order_id = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $order_id = $order_id + 1;
                        echo "<tr>
                                    <td style='font-weight: bold;'>" .
                            $row["order_id"] .
                            "</td>
                                    <td>" .
                            $row["user_id"] .
                            "</td>
                                    <td>" .
                            $row["product_id"] .
                            "</td>
                                    <td>" .
                            $row["order_price"] .
                            "</td>
                                    <td>" .
                            $row["order_payment_status"] .
                            "</td>
                                    <td>" .
                            $row["order_status"] .
                            "</td>
                                    <td>" .
                            $row["order_date"] .
                            "</td>
                                    <td>" .
                            $row["order_quantity"] .
                            "</td>
                                    <td> <button class='edit btn btn-sm btn-warning' id=" .
                            $row["order_id"] .
                            ">Update Status</button>
                                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!--Modal or popup form for adding products-->
            <div id="ModalLoginForm" class="modal fade">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Update Status</h1>
                        </div>
                        <div class="modal-body">
                        <form name="myform" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                                <div class="form-group">
                                    <center>
                                    <div class="row">
                                        <div class="col-md-4" style="margin-left: 70px;">
                                            <label for="order_status" class="form-label">Order Status</label>
                                            <select id="order_status" name="order_status" class="form-select">
                                                <option disabled>---</option>
                                                <option value="In Progress">In progress</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Done">Done</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="order_payment_status" class="form-label">Payment Status</label>
                                            <select id="order_payment_status" name="order_payment_status"
                                                class="form-select">
                                                <option disabled>---</option>
                                                <option value="In Progress">In progress</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Done">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                    </center>
                                </div>
                                <div class="form-group">
                                    <div style="margin-left: 145px;">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top: 10px; margin-bottom: 0px;">
                                            Save
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                            style="margin-top: 10px; margin-bottom: 0px;">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--Modal form ends here-->







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

            //


        });
        function validateform () {
            var orderstatus = document.getElementById('order_status').checked;
            var orderpaymentstatus = document.getElementById('order_payment_status').checked;

            if (orderstatus == false && orderpaymentstatus == false) {
                alert("Please select one of the option.");
                return false;
            }
        }
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                orderedstatus = tr.getElementsByTagName("td")[4].innerText;
                orderedpaymentstatus = tr.getElementsByTagName("td")[5].innerText;
        
                console.log(orderedstatus, orderedpaymentstatus);

                order_status.value = orderedstatus;
                order_payment_status.value = orderedpaymentstatus;
                
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#ModalLoginForm').modal('toggle');
            })
        })
    </script>
</body>

</html>