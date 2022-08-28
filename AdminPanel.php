<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "testproject";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
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
    
    <link href="http://fonts.cdnfonts.com/css/clash-display" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
    
    <script src='https://cdn.plot.ly/plotly-2.14.0.min.js'></script>

    <title>CASE MIS - Admin Panel</title>
  </head>
    
    
    <body class="bg-dark text-white" style="font-family: 'Clash Display', sans-serif;">

      
<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-md-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">CASE MIS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="seasonwise.php">Seasonwise AQI</a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link" href="yearly.php" tabindex="-1" >Yearly AQI</a>
        </li>
          
<!--
        <li class="nav-item">
          <a class="nav-link" href="divisionwise.php" tabindex="-1" >Divisionwise AQI</a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link" href="stationwise.php" tabindex="-1" >Stationwise AQI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comparison.php" tabindex="-1" >Compare AQI</a>
        </li>
-->

      </ul>
      <form class="d-flex">

        <a href="logout.php" class="btn btn-success" tabindex="-1" role="button">Logout</a>
          
      </form>
    </div>
  </div>
</nav>

    <div class="container my-4">

    <div class="row">
        <div class="col-md-7 col-lg-7">
            <!-- <img src="/SocialMedia/avatar.jpg" alt="avatar.jpg" style="width: 50%;"> -->
            <h1>ADMIN PANEL</h1>
            <h5>Welcome, <?php echo $_SESSION['username']?></h5>
            <button type="button" class="btn btn-primary btn-sm" style="border-radius: 30px;">Active</button>
        </div>
        <div class="col-md-2 col-lg-2"></div>

        <div class="col-md-3 col-lg-3">
            
            <div class="card">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <a href="divisionwise.php" >Divisionwise AQI</a>
                  </li>
                <li class="list-group-item">
                  <a  href="stationwise.php"  >Stationwise AQI</a>
                  </li>
                <li class="list-group-item">
                  <a href="comparison.php" >Compare AQI</a>
                  </li>
              </ul>
            </div>
            
        </div>
    </div>
        
        
        <?php
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        $fullname = $_POST["fullname"];
        $Designation = $_POST["Designation"];
        $Date = $_POST["Date"];
        $Topic= $_POST["Topic"];
        $Details =  $_POST["Details"];
        $exists = false;
        


            $sql ="INSERT INTO `Feedback` (`FullName`, `Designation`, `Date`, `Topic`, `Details`) VALUES ('$fullname', '$Designation', '$Date', '$Topic', '$Details')";


            if ($conn->query($sql) === TRUE) {
            echo  '<script>alert("New record created successfully")</script>';

            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }


    }
?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" style="margin-top: 30px;">
            
                 <form action="/CASE MIS V2/AdminPanel.php" method = "post">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                     
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Designation</label>
                          <input type="text" class="form-control" id="Designation" name="Designation">
                        </div>
                     
                         <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Date</label>
                          <input type="date" class="form-control" id="Date" name="Date">
                        </div>
                     
                         <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Topic</label>
                          <input type="text" class="form-control" id="Topic" name="Topic">
                        </div>
                     
                     <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                      <textarea class="form-control" id="Details" rows="3" name="Details"></textarea>
                    </div>
                     
                     <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

        </div>
