

<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "testproject";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*include 'partials/_dbconnect.php';*/
    $username = $_POST["username"];
    $password = $_POST["password"];
    $deg = $_POST["deg"];
        
    $sql ="Select * from USERS where username = '$username' AND password = '$password' AND designation = '$deg'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1){
     $login = true;
     session_start();
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;
     header("location: adminDashBoard.php");
    }

    else{
        $showError = "Passwords don't match!";
    }

  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
    <link href="http://fonts.cdnfonts.com/css/clash-display" rel="stylesheet">

    <title>CASE MIS- Login</title>
  </head>
  <body>


    <?php

    if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    Success! You are logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
    }

    if($showError){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Sorry! Please check the password again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' ;
        }

    ?>



    <div class="container my-4" style="font-family: 'Akshar';">

    <div class="row">
        <div class="col-md-8 col-lg-8">
          <img src="/CASE MIS/img/Signup scene.jpg" alt="signin" style="width: 90%;">
        </div>

        <div class="col-md-4 col-lg-4">
        <h1 class="text-center">Already have an account? Login Now</h1> 
            <form action="/CASE MIS/login.php" method = "post">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="deg" class="form-label">Choose your Designation:</label>
                <br>
                    <select class="form-select" aria-label="Default select example" name="deg" >
<!--                    <option value="volvo">General User</option>-->
                    <option value="Data Entry Operator">Data Entry Operator</option>
<!--                    <option value="opel">Report Creator</option>-->
                    <option value="Dhaka City Corporation Rep.">Dhaka City Corporation Rep.</option>
                    <option value="Ministry of ENV Rep.">Ministry of ENV Rep.</option>
                    </select>
            </div>
                
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="index.php" class="btn btn-success" tabindex="-1" role="button">BACK</a>
            </div>

            </form> 
        </div>

    </div>


</div>
      
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px; font-family: 'Clash Display', sans-serif;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>