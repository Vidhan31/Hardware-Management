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


<?php if (isset($_POST["save"])) {
    $empname = $_POST["emp_name"];
    $emp_mobile = $_POST["emp_mobile"];
    $empemail = $_POST["emp_email"];
    $empdesignation = $_POST["emp_designation"];
    $empsalary = $_POST["emp_salary"];
    $empaddress = $_POST["emp_address"];
    $sql = "INSERT INTO employee (emp_name, emp_mobile, emp_email, emp_designation, emp_salary, emp_address)
        VALUES ('$empname', '$emp_mobile', '$empemail', '$empdesignation', '$empsalary', '$empaddress')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> The record has been inserted successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>×</span>
            </button>
          </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> The record was not inserted successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>×</span>
            </button>
          </div>" . mysqli_error($conn);
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
    <!-- Icon Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7374cf5a2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!--Bootstrap link-->
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
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
</head>

<body>
    <!--sidebar code starts here-->
        
    
    <?php require 'partials/clientsidebar.php' ?>

  
    <section class="home-section">
        
    <?php require 'partials/clientnav.php' ?>
 
        <div class="home-content">
            <!--In below code, Button and heading is in single line.-->
            <!-- Nothing much here -->
              <button type="button" class="btn btn-outline-success" style="margin-left: 20px; margin-bottom: 5px;"
                    data-toggle="modal" data-target="#ModalLoginForm">Add details </button>
            </p>
            <div style="margin-left: 20px; margin-right: 20px;">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Email ID</th>
                            <th>Salary</th>
                            <th>Designation</th>
                            <th>Registered Date</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php
                    $sql = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td style='font-weight: bold;'>" .
                                $row["emp_id"] .
                                "</td>
                                    <td>" .
                                $row["emp_name"] .
                                "</td>
                                    <td>" .
                                $row["emp_address"] .
                                "</td>
                                    <td>" .
                                $row["emp_mobile"] .
                                "</td>
                                    <td>" .
                                $row["emp_email"] .
                                "</td>
                                    <td>" .
                                $row["emp_salary"] .
                                "</td>
                                    <td>" .
                                $row["emp_designation"] .
                                "</td>
                                    <td>" .
                                $row["emp_join_date"] .
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
            <!--Modal or popup form for adding products-->
            <div id="ModalLoginForm" class="modal fade">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Add details</h1>
                        </div>
                        <div class="modal-body">
                        <form name="myform" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <label for="emp_name" class="control-label">Name<span style="color: red">*</span></label>
                                    <div>
                                        <input type="text" class="form-control input-lg" name="emp_name"
                                            id="emp_name" value="">
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="form-group name1 col-md-6">
                                        <label for="emp_salary" class="control-label">Salary<span style="color: red">*</span></label>
                                        <input type="number" class="form-control input-lg" name="emp_salary"
                                            id="emp_salary" value="">
                                        </div>

                                        <div class="form-group name2 col-md-6">
                                            <label for="emp_designation" class="control-label"> Designation<span style="color: red">*</span></label>
                                            <input type="text" class="form-control input-lg" name="emp_designation"
                                                id="emp_designation" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="emp_email" class="control-label">Email ID<span style="color: red">*</span></label>
                                    <div>
                                        <input type="email" class="form-control input-lg" name="emp_email"
                                            id="emp_email" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_mobile" class="control-label">Mobile Number<span style="color: red">*</span></label>
                                    <div>
                                        <input type="number" class="form-control input-lg" name="emp_mobile"
                                            id="emp_mobile" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_address" class="control-label">Address</label>
                                    <div>
                                        <textarea class="form-control" rows="3" name="emp_address"
                                            id="emp_address"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <center>
                                    <div>
                                        <button type="submit" name="save" class="btn btn-success"
                                            style="margin-top: 10px; margin-bottom: 0px;">
                                            Save
                                        </button>
                                        
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                            style="margin-top: 10px; margin-bottom: 0px;">
                                            Cancel
                                        </button>
                                    </div>
                                    </center>
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
        });
        function validateform() {
            var emp_name = document.getElementById('emp_name').value;
            var emp_id = document.getElementById('emp_id').value;
            var emp_address = document.getElementById('emp_address').value;
            var emp_email = document.getElementById('emp_email').value;
            var emp_mobile = document.getElementById('emp_mobile').value;
            var emp_designation = document.getElementById('emp_designation').value;

    
            if (emp_designation == "" || emp_designation == null) {
                alert ("Please enter employee designation.");
                return false;
            }
            
            else if (emp_name == null || emp_name == "") {
                alert("Name can't be blank.");
                return false;
            }
            else if (emp_name.length < 3) {
                alert("Name can't be this short.");
                return false;
            }
            
            else if (emp_email == "" || emp_email == null) {
                alert ("Employee email cannot be blank.");
                return false;
            }
            else if (emp_email.length < 5) {
                alert("Email can't be this short.");
                return false;
            }
            else if (emp_mobile == "" || emp_mobile == null) {
                alert ("Supplier mobile number cannot be blank.");
                return false;
            }
            else if (emp_mobile.length != 10) {
                alert("Enter a valid 10 digits mobile number.");
                return false;
            }
            else if(emp_salary == "" || emp_salary == null) {
                alert("Salary can't be blank.");
                return false;
            }
        }
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    </script>

</body>

</html>