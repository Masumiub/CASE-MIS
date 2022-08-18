
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
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*include 'partials/_dbconnect.php';*/
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $deg = $_POST["deg"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $exists = false;

        if(($password == $cpassword) && $exists==false){

            $sql ="INSERT INTO `USERS` (`username`, `fullname`, `email`, `dob`, `designation`, `password`) VALUES ('$username', '$fullname', '$email', '$dob', '$deg', '$password')";
            $result = mysqli_query($conn, $sql);

            if($result){
               $showAlert = true;
            }
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

    <title>CASE MIS- SignUp</title>
  </head>
  <body>



    <?php

    if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    Success! Your Account was created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
    }

    if($showError){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Sorry! Please confirm the password again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' ;
        }

    ?>

    <div class="container my-4" style="font-family: 'Akshar'; ">

    <div class="row">
        <div class="col-md-8 col-lg-8">
          <img src="/CASE MIS/img/Login scene.jpg" alt="signup" style="width: 90%;">
        </div>

        <div class="col-md-4 col-lg-4">
        <h1 class="text-center" >Don't have an Account? Signup Today.</h1> 
            <form action="signup.php" method = "post">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" >
            </div>
            <div class="mb-3">
                <label for="deg" class="form-label" >Choose your Designation:</label>
                <br>
                    <select class="form-select" aria-label="Default select example" name="deg">
<!--                    <option value="volvo">General User</option>-->
                    <option value="Data Entry Operator">Data Entry Operator</option>
<!--                    <option value="opel">Report Creator</option>-->
                    <option value="Dhaka City Corporation Rep.">Dhaka City Corporation Rep.</option>
                    <option value="Ministry of ENV Rep.">Ministry of ENV Rep.</option>
                    </select>
            </div>
                
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Signup</button>
                <a href="index.php" class="btn btn-success" tabindex="-1" role="button">BACK</a>
            </div>
            </form>
        </div>
    </div>
         

    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>