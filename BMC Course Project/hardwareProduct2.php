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

if (isset($_GET["delete"])) {
    $sno = $_GET["delete"];
    $delete = true;
    $sql = "DELETE FROM product WHERE product_id = '$sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The record has been deleted successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Oops!</strong> The record couldn't be deleted.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>" . mysqli_error($conn);
    }
}
?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["snoEdit"])) {
        $sno = $_POST["snoEdit"];
        $proprice = $_POST["product_price"];
        $catname = $_POST["category_name"];
        $procolor = $_POST["product_color"];
        $proname = $_POST["product_name"];
        $supname = $_POST["supplier_name"];
        $proquantity = $_POST["quantity"];
        $sql = "UPDATE product SET product_price = '$proprice' , category_name = '$catname', product_color = '$procolor', product_name = '$proname', supplier_name = '$supname', quantity = '$proquantity'
            WHERE `product`.`product_id` = $sno";
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
            <div style="margin-left: 20px; margin-right: 20px;">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Price(Rs)</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($conn, $sql);
                        $product_id = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $product_id + 1;
                            echo "<tr>
                                    <td style='font-weight: bold;'>" .
                                $row["product_id"] .
                                "</td>
                                    <td>" .
                                $row["product_name"] .
                                "</td>
                                    <td>" .
                                $row["product_color"] .
                                "</td>
                                    <td>" .
                                $row["product_price"] .
                                "</td>
                                    <td>" .
                                $row["category_name"] .
                                "</td>
                                    <td>" .
                                $row["supplier_name"] .
                                "</td>
                                    <td>" .
                                $row["quantity"] .
                                "</td>
                                    <td> <button class='edit btn btn-sm btn-primary' id=" .
                                $row["product_id"] .
                                ">Edit</button> <button class='delete btn btn-sm btn-danger' id=d" .
                                $row["product_id"] .
                                ">Delete</button> </td>
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
                            <h1 class="modal-title">Modify details</h1>
                        </div>
                        <div class="modal-body">
                            <form name="myform" action="hardwareProduct2.php" method="POST"
                                enctype="multipart/form-data" onsubmit="return validateform()">
                                <input type="hidden" name="snoEdit" id="snoEdit">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group name1 col-md-6">
                                            <label for="product_id" class="control-label">Product ID</label>
                                            <input type="number" class="form-control input-lg" name="product_id"
                                                id="product_id" value="" disabled>
                                        </div>

                                        <div class="form-group name2 col-md-6">
                                            <label for="product_price" class="control-label">Product Price (in
                                                Rs.)</label>
                                            <input type="number" class="form-control input-lg" id="product_price"
                                                name="product_price" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group name1 col-md-6">
                                            <label for="category_name" class="control-label">Category</label> <br>
                                            <input type="text" class="form-control input-lg" name="category_name"
                                                id="category_name" value="">
                                        </div>

                                        <div class="form-group name2 col-md-6">
                                            <label for="product_color" class="control-label">Product Color</label>
                                            <input type="text" class="form-control input-lg" id="product_color"
                                                name="product_color" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product Name</label>
                                    <div>
                                        <input type="text" class="form-control input-lg" name="product_name"
                                            id="product_name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group name1 col-md-6">
                                            <label for="supplier_name" class="control-label">Product Brand</label>
                                            <input type="text" class="form-control input-lg" name="supplier_name"
                                                id="supplier_name" value="">
                                        </div>

                                        <div class="form-group name2 col-md-6">
                                            <label for="quantity" class="control-label">Quantity</label>
                                            <input type="number" class="form-control input-lg" name="quantity"
                                                id="quantity" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <div>
                                        <button type="submit" id="update" name="update" class="btn btn-warning"
                                                style="margin-top: 10px; margin-bottom: 0px;">
                                                Update
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
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        function validateform() {
            var proname = document.getElementById('product_name').value;
            var procolor = document.getElementById('product_color').value;
            var proprice = document.getElementById('product_price').value;
            var catname = document.getElementById('category_name').value;
            var supname = document.getElementById('supplier_name').value;
            var proquantity = document.getElementById('quantity').value;
            if (proprice == null || proprice == "") {
                alert("Product price can't be blank.");
                return false;
            }
            else if (catname == null || procolor == "") {
                alert("Product color can't be blank.");
                return false;
            }
            else if (procolor == null || procolor == "") {
                alert("Product color can't be blank.");
                return false;
            }
            else if (proname == "" || proname == null) {
                alert("Please enter the product name.");
                return false;
            }
            else if (supname == null || supname == "") {
                alert("Product brand can't be blank.");
                return false;
            }
            if (proquantity == null || proquantity == "") {
                alert("Please enter product quantity.");
                return false;
            }
        }
    </script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                productname = tr.getElementsByTagName("td")[1].innerText;
                productcolor = tr.getElementsByTagName("td")[2].innerText;
                productprice = tr.getElementsByTagName("td")[3].innerText;
                categoryname = tr.getElementsByTagName("td")[4].innerText;
                suppliername = tr.getElementsByTagName("td")[5].innerText;
                productquantity = tr.getElementsByTagName("td")[6].innerText;
                console.log(productname, productcolor, productprice, categoryname, suppliername, productquantity);

                product_price.value = productprice;
                category_name.value = categoryname;
                product_color.value = productcolor;
                product_name.value = productname;
                supplier_name.value = suppliername;
                quantity.value = productquantity;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#ModalLoginForm').modal('toggle');
            })
        })
        deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete the record?")) {
          console.log("yes");
          window.location = `hardwareProduct2.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
</body>

</html>