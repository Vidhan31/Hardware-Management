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
// $password = "password";
// $database = "bmc_sanitaryware2";

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
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">

    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
</head>

<body>
    <!--sidebar code starts here-->
        
    
    <?php require 'partials/clientsidebar.php' ?>

  
    <section class="home-section">

    <?php require 'partials/clientnav.php' ?>

        <div class="home-content">
        <!-- <button type="button" id="showpass" class="btn btn-danger" data-toggle="button"
                    aria-pressed="false" autocomplete="off" style="margin-left: 20px; margin-bottom: 10px;">Show/Hide passwords</button> -->
            <!--In below code, Button and heading is in single line.-->
            <!-- Nothing much here -->
            <div style="margin-left: 20px; margin-right: 20px;">
            <table id="myTable" class="table table-striped" style="width:100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Mobile Number</th>
                            <th>Email ID</th>
                            <th>Address</th>

                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php if (isset($_POST["searchid"])) {
                        $search = $_POST["search"];
                        $userid = $_POST["user_id"];
                        $usermobile = $_POST["user_mobile"];
                        $useremail = $_POST["user_email"];
                        $usersname = $_POST["user_name"];
                        $useraddress = $_POST["user_address"];
                        $sql = "SELECT * FROM user WHERE user_id = '$search'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td style='font-weight: bold;'>" .
                                    $row["user_id"] .
                                    "</td>
                                    <td>" .
                                    $row["user_name"] .
                                    "</td>
                                    <td>" .
                                    $row["user_mobile"] .
                                    "</td>
                                    <td>" .
                                    $row["user_email"] .
                                    "</td>
                                    <td>" .
                                    $row["user_address"] .
                                    "</td>
                                    </tr>";
                            }
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>0</strong> results found!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
                        }
                    } ?>
                        <?php
                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td style='font-weight: bold;'>" .
                                    $row["user_id"] .
                                    "</td>
                                    <td>" .
                                    $row["user_name"] .
                                    "</td>
                                    <td>" .
                                    $row["user_mobile"] .
                                    "</td>
                                    <td>" .
                                    $row["user_email"] .
                                    "</td>
                                    <td>" .
                                    $row["user_address"] .
                                    "</td>
                                    </tr>";
                            }
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>0</strong> results found!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
                        }
                        ?>
                    </tbody>
                </table>
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
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    

    </script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

</html>