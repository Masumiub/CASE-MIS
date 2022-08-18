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

    <title>CASE MIS - Admin DashBoard</title>
  </head>
  <body style="font-family: 'Clash Display', sans-serif;">

      
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
          
        <li class="nav-item">
          <a class="nav-link" href="divisionwise.php" tabindex="-1" >Divisionwise AQI</a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link" href="stationwise.php" tabindex="-1" >Stationwise AQI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comparison.php" tabindex="-1" >Compare AQI</a>
        </li>

      </ul>
      <form class="d-flex">

        <a href="logout.php" class="btn btn-success" tabindex="-1" role="button">Logout</a>
          
      </form>
    </div>
  </div>
</nav>

 <?php

//        if($_SERVER['REQUEST_METHOD'] == 'POST')
//        {
//            $usernameAC = $_POST['username'];
//            $statusText = $_POST['statusText'];
//            //echo "Your post was successful.<br>";
//
//
//            $servername = "localhost";
//            $username = "root";
//            $password = "";
//            $database = "users";
//
//
//            $conn = mysqli_connect($servername, $username, $password, $database);
//
//            if(!$conn){
//              die("Sorry we failed to connect: ". mysqli_connect_error());
//            }	
//
//
//
//            $sql = "INSERT INTO `status` (`username`, `status`) VALUES ('$usernameAC', '$statusText')";
//
//            $result = mysqli_query($conn, $sql);
//
//            if(!$result){
//              /*echo "The data was inserted successfully!<br>";
//            }
//            else{*/
//              echo "The data wasn't inserted successfully because of this error";
//            }
//        }  
?> 
    <div class="container my-4">

    <div class="row">
        <div class="col-md-7 col-lg-7">
            <!-- <img src="/SocialMedia/avatar.jpg" alt="avatar.jpg" style="width: 50%;"> -->
            <h1>ADMIN DASHBOARD</h1>
            <h5>Welcome, <?php echo $_SESSION['username']?></h5>
            <button type="button" class="btn btn-primary btn-sm" style="border-radius: 30px;">Active</button>
        </div>
        <div class="col-md-2 col-lg-2"></div>

        <div class="col-md-3 col-lg-3">
            
            <div class="card">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Compare AQI</li>
                <li class="list-group-item">Stationwise AQI</li>
                <li class="list-group-item">Divisionwise AQI</li>
              </ul>
            </div>
            
        </div>
    </div>
    



      <div class="row" style="margin-top: 40px;">
          
        <div class="col-md-6 col-lg-6">
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
              <div class="card-body">
                    <h5>Import CSV File into AQI Database- PurpleAir</h5>
                    <form action="adminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
        <!--                        <label class="custom-file-label" for="customFileInput">Select file</label>-->
                            </div>

                        </div>

                            <div class="input-group-append" style="margin-top: 20px;">
                                <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                            </div>
                    </form>
                  
                </div>
            </div>

        </div>

        
        <?php
            if(isset($_POST['submit'])){
                
                    $fileMimes = array(
                        'text/x-comma-separated-values',
                        'text/comma-separated-values',
                        'application/octet-stream',
                        'application/vnd.ms-excel',
                        'application/x-csv',
                        'text/x-csv',
                        'text/csv',
                        'application/csv',
                        'application/excel',
                        'application/vnd.msexcel',
                        'text/plain'
                    );
                
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){
                        // Open uploaded CSV file with read-only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
                        // Skip the first line
                        fgetcsv($csvFile);
                    
                        while (($getData = fgetcsv($csvFile, 27652, ",")) !== FALSE)
                        {
                            // Get row data
                            $Time = $getData[0];
                            $Location = $getData[1];
                            $Latitude = $getData[2];
                            $Longitude = $getData[3];
                            $Mean = $getData[4];

                            // If user already exists in the database with the same email
                            $query = " SELECT Mean FROM `routewise_data_purpleair` WHERE Time = '" . $getData[0] . "' ";

                            $check = mysqli_query($conn, $query);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `routewise_data_purpleair` SET Location = '" . $Location . "', 
                                Latitude = '" . $Latitude . "', 
                                Longitude = '" . $Longitude . "', 
                                Mean = '" . $Mean . "'
                                WHERE Time = '" . $Time . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `routewise_data_purpleair` (Time, Location, Latitude, Longitude, Mean) VALUES ('" . $Time . "', 
                                 '" . $Location . "', 
                                 '" . $Latitude . "', 
                                 '" . $Longitude . "',
                                 '" . $Mean . "')");

                            }
                        }
                }
            }
        ?>
      
        <div class="col-md-6 col-lg-6">
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
              <div class="card-body">
                  
                    <h5>Import CSV File into AQI Database- EPA </h5>
                    <form action="adminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
        <!--                        <label class="custom-file-label" for="customFileInput">Select file  </label>-->
                            </div>

                        </div>
                            <div class="input-group-append" style="margin-top: 20px;">
                                <input type="submit" name="submit2" value="Upload" class="btn btn-primary">
                            </div>
                    </form>
              </div>
            </div>
            
        </div>
          
        <?php
            if(isset($_POST['submit2'])){
                
                    $fileMimes = array(
                        'text/x-comma-separated-values',
                        'text/comma-separated-values',
                        'application/octet-stream',
                        'application/vnd.ms-excel',
                        'application/x-csv',
                        'text/x-csv',
                        'text/csv',
                        'application/csv',
                        'application/excel',
                        'application/vnd.msexcel',
                        'text/plain'
                    );
                
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){
                        // Open uploaded CSV file with read-only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
                        // Skip the first line
                        fgetcsv($csvFile);
                    
                        while (($getData = fgetcsv($csvFile, 11237, ",")) !== FALSE)
                        {
                            // Get row data
                            $Time = $getData[0];
                            $Location = $getData[1];
                            $Latitude = $getData[2];
                            $Longitude = $getData[3];
                            $Mean = $getData[4];

                            // If user already exists in the database with the same email
                            $query = " SELECT Mean FROM `routewise_data_epa` WHERE Time = '" . $getData[0] . "' ";

                            $check = mysqli_query($conn, $query);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `routewise_data_epa` SET Location = '" . $Location . "', 
                                Latitude = '" . $Latitude . "', 
                                Longitude = '" . $Longitude . "', 
                                Mean = '" . $Mean . "'
                                WHERE Time = '" . $Time . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `routewise_data_epa` (Time, Location, Latitude, Longitude, Mean) VALUES ('" . $Time . "', 
                                 '" . $Location . "', 
                                 '" . $Latitude . "', 
                                 '" . $Longitude . "',
                                 '" . $Mean . "')");

                            }
                        }
                }
            }
        ?>
          

      </div>
        
        
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-6 col-lg-6">
                <div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
            </div>
            
            <script>
            var data = [
              {
                x: [2018, 2019, 2020, 2021],
                y: [20, 14, 23, 50],
                type: 'bar'
              }
            ];

            Plotly.newPlot('myDiv', data);

            </script>
            
            <div class="col-md-6 col-lg-6">
                <div id='myDiv2'><!-- Plotly chart will be drawn inside this DIV --></div>
            </div>
            
            <script>
                var trace1 = {
                  x: [1, 2, 3, 4],
                  y: [10, 15, 13, 17],
                  type: 'scatter'
                };

                var trace2 = {
                  x: [1, 2, 3, 4],
                  y: [16, 5, 11, 9],
                  type: 'scatter'
                };

                var data = [trace1, trace2];

                Plotly.newPlot('myDiv2', data);

            </script>
        </div>
        
        
    <div class="row" style="margin-top: 40px;">
          
        <div class="col-md-6 col-lg-6">
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
              <div class="card-body">
                    <h5>Import CSV File - Stationwise Data</h5>
                    <form action="adminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
        <!--                        <label class="custom-file-label" for="customFileInput">Select file</label>-->
                            </div>

                        </div>

                            <div class="input-group-append" style="margin-top: 20px;">
                                <input type="submit" name="submit3" value="Upload" class="btn btn-primary">
                            </div>
                    </form>
                  
                </div>
            </div>

        </div>
        
        <div class="col-md-6 col-lg-6">
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
              <div class="card-body">
                    <h5>Import CSV File - Organization Station Data</h5>
                    <form action="adminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
        <!--                        <label class="custom-file-label" for="customFileInput">Select file</label>-->
                            </div>

                        </div>

                            <div class="input-group-append" style="margin-top: 20px;">
                                <input type="submit" name="submit4" value="Upload" class="btn btn-primary">
                            </div>
                    </form>
                </div>
            </div>

        </div>
        
        <?php
            if(isset($_POST['submit4'])){
                
                    $fileMimes = array(
                        'text/x-comma-separated-values',
                        'text/comma-separated-values',
                        'application/octet-stream',
                        'application/vnd.ms-excel',
                        'application/x-csv',
                        'text/x-csv',
                        'text/csv',
                        'application/csv',
                        'application/excel',
                        'application/vnd.msexcel',
                        'text/plain'
                    );
                
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){
                        // Open uploaded CSV file with read-only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
                        // Skip the first line
                        fgetcsv($csvFile);
                    
                        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                        {
                            // Get row data
                            $DataID = $getData[0];
                            $Organization = $getData[1];
                            $Station = $getData[2];
                            $Division = $getData[3];

                            // If user already exists in the database with the same email
                            $query = " SELECT Station FROM `organization_station` WHERE DataID = '" . $getData[0] . "' ";

                            $check = mysqli_query($conn, $query);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `organization_station` SET Organization = '" . $Organization . "', 
                                Station = '" . $Station . "', 
                                Division = '" . $Division . "'
                                WHERE DataID = '" . $DataID . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `organization_station` (DataID, Organization, Station, Division) VALUES ('" . $DataID . "', 
                                 '" . $Organization . "', 
                                 '" . $Station . "', 
                                 '" . $Division . "')");

                            }
                        }
                }
            }
        ?>
        
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