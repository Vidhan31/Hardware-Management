<?php
// Connecting to the Database
// $servername = "localhost";
// $username = "root";
// $password = "password";
// $database = "bmc_sanitaryware2";
include 'partials/dbconnect.php';


// Create a connection
// $conn = mysqli_connect($servername, $username, $password, $database);
// // Die if connection was not successful
// if (!$conn) {
//     die("Sorry we failed to connect: " . mysqli_connect_error());
// }

/*else{
echo "Connection was successful<br>";
}*/
?>

<?php
$login = false;
$showError = false;
if (isset($_POST["submit"])) {
    $clientname = $_POST["client_name"];
    $clientpassword = $_POST["client_pass"];

    // $sql = "Select * from users where client_name='$client_name' AND client_pass='$client_pass'";
    $sql = "SELECT * FROM client WHERE client_name = '$clientname' AND client_password = '$clientpassword'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if($clientpassword == $row['client_password']) {
                $login = true;
                session_start();
                $_SESSION["loggedinc"] = true;
                $_SESSION["client_name"] = $clientname;
                header("location: hardwareClient.php");
            } else {
                $showError = "Invalid Credentials";
            }
        }
    } else {
        $showError = "Invalid Credentials";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
    <script>
        function validateform() {
            var client_name = document.getElementById('client_name').value;
            var client_pass = document.getElementById('client_pass').value;
            if (client_name == "" || client_name == null) {
                alert("Username cannot be empty");
                return false;
            }
            else if (client_pass == "" || client_pass == null) {
                alert ("Password cannot be empty");
                return false;
            }
        }
    </script>
  </head>
  <body style="background-color: #ffe1ad;">
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' .
            $showError .
            '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4 col-md-8" style="background-color: #ff98ad; ">
     <h1 class="text-center">Client Login</h1>
     <form name="clientlogin" action="<?php echo htmlspecialchars(
         $_SERVER["PHP_SELF"]
     ); ?>" method="post" onsubmit="return validateform()">
        <div class="form-group">
            <label for="client_name">Username</label>
            <input type="text" class="form-control" id="client_name" name="client_name" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="client_pass">Password</label>
            <input type="password" class="form-control" id="client_pass" name="client_pass">
        </div>
       
         
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
</body>
</html>