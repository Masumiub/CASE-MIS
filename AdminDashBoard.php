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
            <h1>ADMIN DASHBOARD</h1>
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
    



      <div class="row" style="margin-top: 20px;">
          
                    
        <div class="div text-center">
          <h1 style="padding: 20px;">
            Upload CSV File to Database
          </h1>
        </div>
          
        <div class="col-md-6 col-lg-6">
            
            <div class="card " style="background-color: #3d3d3d; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.65) 0px 7px 29px 0px; padding: 25px;">
<!--
              <div class="card-header">
                Upload
              </div>
-->
              <div class="card-body">
                    <h5>Import CSV File into Organization_Station</h5>
                    <form action="AdminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
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
                    
                        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                        {
                            // Get row data
                            $StationSurKey = $getData[0];
                            $Organization_Name = $getData[1];

                            // If user already exists in the database with the same email
                            $query = " SELECT * FROM `organization_station` ";

                            $check = mysqli_query($conn, $query);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `organization_station` SET Organization_Name = '" . $Organization_Name . "', 
                                WHERE StationSurKey = '" . $StationSurKey . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `organization_station` (StationSurKey, Organization_Name) VALUES ('" . $StationSurKey . "', 
                                 '" . $Organization_Name . "' )");

                            }
                        }
                }
            }
        ?>
      
        <div class="col-md-6 col-lg-6">
            
        <div class="card " style="background-color: #3d3d3d; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.65) 0px 7px 29px 0px; padding: 25px;">
<!--
              <div class="card-header">
                Upload
              </div>
-->
              <div class="card-body">
                  
                    <h5>Import CSV File into Stationwise_data </h5>
                    <form action="AdminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
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
                            $StationSurKey = $getData[1];
                            $PM25 = $getData[2];
                            $Average_Temperature = $getData[3];
                            $Rain_Precipitation = $getData[4];
                            $Wind_Speed = $getData[5];
                            $Visibility = $getData[6];
                            $Cloud_Cover = $getData[7];
                            $Relative_Humidity = $getData[8];
                            $Year = $getData[9];
                            $Season = $getData[10];

                            // If user already exists in the database with the same email
                            $query2 = " SELECT * FROM `stationwise_data`";

                            $check = mysqli_query($conn, $query2);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `stationwise_data` SET 
                                StationSurKey = '" . $StationSurKey . "', 
                                PM25 = '" . $PM25 . "', 
                                Average_Temperature = '" . $Average_Temperature . "', 
                                Rain_Precipitation = '" . $Rain_Precipitation . "',
                                Wind_Speed = '" . $Wind_Speed . "',
                                Visibility = '" . $Visibility . "',
                                Cloud_Cover = '" . $Cloud_Cover . "',
                                Relative_Humidity = '" . $Relative_Humidity . "',
                                Year = '" . $Year . "',
                                Season = '" . $Season . "'
                                WHERE Time = '" . $Time . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `stationwise_data` (Time, StationSurKey, PM25, Average_Temperature, Rain_Precipitation, Wind_Speed, Visibility, Cloud_Cover, Relative_Humidity, Year, Season) VALUES ('" . $Time . "', 
                                 '" . $StationSurKey . "', 
                                 '" . $PM25 . "', 
                                 '" . $Average_Temperature . "',
                                 '" . $Rain_Precipitation . "',
                                    '" . $Wind_Speed . "',
                                    '" . $Visibility . "',
                                    '" . $Cloud_Cover . "',
                                    '" . $Relative_Humidity . "',
                                    '" . $Year . "',
                                 '" . $Season . "')");

                            }
                        }
                }
            }
        ?>
          

      </div>
        
        
 
        
        
    <div class="row" style="margin-top: 40px;">
          
        <div class="col-md-6 col-lg-6">
            
        <div class="card " style="background-color: #3d3d3d; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.65) 0px 7px 29px 0px; padding: 25px;">
<!--
              <div class="card-header">
                Upload
              </div>
-->
              <div class="card-body">
                    <h5>Import CSV File - Routewise Data</h5>
                    <form action="AdminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
                            </div>

                        </div>

                            <div class="input-group-append" style="margin-top: 20px;">
                                <input type="submit" name="submit3" value="Upload" class="btn btn-primary">
                            </div>
                    </form>
                  
                </div>
            </div>
            
            <?php
            if(isset($_POST['submit3'])){
                
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
                    
                        while (($getData = fgetcsv($csvFile, 40000, ",")) !== FALSE)
                        {
                            // Get row data
                            $RouteSurKey = $getData[0];
                            $Organization_Name = $getData[1];
                            $Time = $getData[2];
                            $Location = $getData[3];
                            $Latitude = $getData[4];
                            $Longitude = $getData[5];
                            $Mean = $getData[6];

                            // If user already exists in the database with the same email
//                            $query = " SELECT Station FROM `organizationwise_data` WHERE DataID = '" . $getData[0] . "' ";
                            $query3 = " SELECT * from `routewise_data` ";
                            $check = mysqli_query($conn, $query3);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `routewise_data` SET 
                                Organization_Name = '" . $Organization_Name . "', 
                                Time = '" . $Time . "', 
                                Location = '" . $Location . "',
                                Latitude = '" . $Latitude . "',
                                Longitude = '" . $Longitude . "',
                                Mean = '" . $Mean . "'
                                WHERE RouteSurKey = '" . $RouteSurKey . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `organizationwise_data` (RouteSurKey, Organization_Name, Time, Location, Latitude, Longitude, Mean) VALUES ('" . $RouteSurKey . "', 
                                 '" . $Organization_Name . "', 
                                 '" . $Time . "', 
                                 '" . $Location . "', 
                                 '" . $Latitude . "', 
                                 '" . $Longitude . "', 
                                 '" . $Mean . "', 
                                 '" . $Division . "')");

                            }
                        }
                }
            }
        ?>

        </div>
        
        <div class="col-md-6 col-lg-6">
            
        <div class="card " style="background-color: #3d3d3d; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.65) 0px 7px 29px 0px; padding: 25px;">
<!--
              <div class="card-header">
                Upload
              </div>
-->
              <div class="card-body">
                    <h5>Import CSV File - Station</h5>
                    <form action="AdminDashBoard.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
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
                            $StationSurKey = $getData[0];
                            $StationID = $getData[1];
                            $Division = $getData[2];


                            // If user already exists in the database with the same email
//                            $query = " SELECT Station FROM `organizationwise_data` WHERE DataID = '" . $getData[0] . "' ";
                            $query4 = " SELECT * from `station` ";
                            $check = mysqli_query($conn, $query4);

                            if ($check->num_rows > 0)
                            {
                                mysqli_query($conn, "UPDATE `station` SET 
                                StationID = '" . $StationID . "', 
                                Division = '" . $Division . "'
                                WHERE StationSurKey = '" . $StationSurKey . "'");
                            }
                            else
                            {
                                 mysqli_query($conn, "INSERT INTO `station` (StationSurKey, StationID,  Division) VALUES ('" . $StationSurKey . "', 
                                 '" . $StationID . "', 
                                 '" . $Division . "')");

                            }
                        }
                }
            }
        ?>
        
      </div>
        
        <div class="div text-center">
          <h1 style="padding: 40px;">
            Insert Raw Data to Database
          </h1>
        </div>
        
        <!-- =============================================================== -->
        <!-- =============================================================== -->

        <!-- Button trigger modal -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  Input Data - Organization
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <?php
                        $showAlert = false;
                        $showError = false;
                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            $OrganizationName = $_POST["OrganizationName"];
                            $exists = false;

                            if($exists==false){

                                $sql ="INSERT INTO `organization` (`Organization_Name`) VALUES ('$OrganizationName')";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                   $showAlert = true;
                                }
                            }
                            else{
                                $showError = "Data don't inserted!";
                            }

                        }
                    ?>
                      <div class="modal-dialog bg-dark">
                        <div class="modal-content bg-dark">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="exampleModalLabel">Input Data into Organization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-dark">
                            <form action="AdminDashBoard.php" method = "post">
                              <div class="mb-3">
                                <label for="Organization-name" class="col-form-label">Organization Name:</label>
                                <input type="text" class="form-control" id="OrganizationName" name="OrganizationName">
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>

                    <!-- =============================================================== -->
                    <!-- =============================================================== -->


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                      Input Data - Organization Station
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                        $showAlert = false;
                        $showError = false;
                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            $Organizationname2 = $_POST["Organizationname2"];
                            $exists = false;

                            if($exists==false){

                                $sql2 ="INSERT INTO `organization_station` (`Organization_Name`) VALUES ('$Organizationname2')";
                                $result2 = mysqli_query($conn, $sql2);

                                if($result2){
                                   $showAlert = true;
                                }
                            }
                            else{
                                $showError = "Data don't inserted!";
                            }

                        }
                    ?>

                      <div class="modal-dialog bg-dark">
                        <div class="modal-content bg-dark">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="exampleModalLabel">Input Data - Organization Station</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-dark">
                            <form action="AdminDashBoard.php" method = "post">
                              <div class="mb-3">
                                <label for="Organizationname2" class="col-form-label">Organization Name:</label>
                                <input type="text" class="form-control" id="Organizationname2" name="Organizationname2">
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                              </form>
                        </div>
                      </div>
                    </div>
                      <!-- =============================================================== -->
                    <!-- =============================================================== -->

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                      Input Data - Routewise
                    </button>

                    <?php
                        $showAlert = false;
                        $showError = false;
                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            $OrganizationName3 = $_POST["OrganizationName3"];
                            $Time = $_POST["Time"];
                            $Location = $_POST["Location"];
                            $Latitude = $_POST["Latitude"];
                            $Longitude = $_POST["Longitude"];
                            $Mean =  $_POST["Mean"];
                            $exists = false;



                                $sql3 ="INSERT INTO `routewise_data` (`Organization_Name`, `Time`, `Location`, `Latitude`, `Longitude`, `Mean`) VALUES ('$OrganizationName3', '$Time', '$Location', '$Latitude', '$Longitude', '$Mean')";


                                if ($conn->query($sql3) === TRUE) {
                                echo  '<script>alert("New record created successfully")</script>';

                                } 


                        }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog bg-dark">
                        <div class="modal-content bg-dark">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="exampleModalLabel3">Input Data - Routewise data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-dark">
                            <form action="AdminDashBoard.php" method = "post">
                              <div class="mb-3">
                                <label for="OrganizationName3" class="col-form-label">Organization Name:</label>
                                <input type="text" class="form-control" id="OrganizationName3" name = "OrganizationName3">
                              </div>

                            <div class="mb-3">
                                <label for="Time" class="col-form-label">Time</label>
                                <input type="date" class="form-control" id="Time" name="Time">
                              </div>

                               <div class="mb-3">
                                <label for="Location" class="col-form-label">Location</label>
                                <input type="text" class="form-control" id="Location" name="Location">
                              </div>

                               <div class="mb-3">
                                <label for="Latitude" class="col-form-label">Latitude</label>
                                <input type="text" class="form-control" id="Latitude" name="Latitude" >
                              </div>


                              <div class="mb-3">
                                <label for="Longitude" class="col-form-label">Longitude</label>
                                <input type="text" class="form-control" id="Longitude" name="Longitude">
                              </div>


                               <div class="mb-3">
                                <label for="Mean" class="col-form-label">Mean</label>
                                <input type="text" class="form-control" id="Mean" name="Mean">
                              </div>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>


                      <!-- =============================================================== -->
                    <!-- =============================================================== -->


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                      Input Data - Station
                    </button>


                    <?php
                        $showAlert = false;
                        $showError = false;
                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            $StationID = $_POST["StationID"];
                            $Division = $_POST["Division"];
                            $exists = false;



                                $sql4 ="INSERT INTO `station` (`StationID`, `Division`) VALUES ('$StationID', '$Division')";


                                if ($conn->query($sql4) === TRUE) {
                                echo  '<script>alert("New record created successfully")</script>';

                                } 


                        }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog bg-dark">
                        <div class="modal-content bg-dark">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="exampleModalLabel3">Input Data - Station</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-dark">
                            <form action="AdminDashBoard.php" method = "post">
                              <div class="mb-3">
                                <label for="StationID" class="col-form-label">StationID:</label>
                                <input type="text" class="form-control" id="StationID" name="StationID">
                              </div>

                            <div class="mb-3">
                                <label for="Division" class="col-form-label">Division</label>
                                <input type="text" class="form-control" id="Division" name="Division">
                              </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>


                    <!-- =============================================================== -->
                    <!-- =============================================================== -->


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                      Input Data - Stationwise Data
                    </button>
                    <?php
                        $showAlert = false;
                        $showError = false;
                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            $Time= $_POST["Time"];
                            $StationSurKey = $_POST["StationSurKey"];
                            $PM25 = $_POST["PM25"];
                            $Average_Temperature = $_POST["Average_Temperature"];
                            $Rain_Precipitation = $_POST["Rain_Precipitation"];
                            $Wind_Speed = $_POST["Wind_Speed"];
                            $Visibility = $_POST["Visibility"];
                            $Cloud_Cover = $_POST["Cloud_Cover"];
                            $Relative_Humidity = $_POST["Relative_Humidity"];
                            $Year = $_POST["Year"];
                            $Season = $_POST["Season"];
                            $exists = false;



                                $sql4 ="INSERT INTO `station` (`Time`, `StationSurKey`, `PM25`, `Average_Temperature`, `Rain_Precipitation`, `Wind_Speed`, `Visibility`, `Cloud_Cover`, `Relative_Humidity`, `Year`, `Season`) VALUES ('$Time', '$StationSurKey', '$PM25', '$Average_Temperature', '$Rain_Precipitation', '$Wind_Speed', '$Visibility' ,'$Cloud_Cover', '$Relative_Humidity', '$Year', '$Season')";


                                if ($conn->query($sql5) === TRUE) {
                                echo  '<script>alert("New record created successfully")</script>';

                                } 


                        }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog bg-dark">
                        <div class="modal-content bg-dark">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="exampleModalLabel3">Input Data - Stationwise Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-dark">
                            <form action="AdminDashBoard.php" method = "post">
                              <div class="mb-3">
                                <label for="Time" class="col-form-label">Time</label>
                                <input type="date" class="form-control" id="Time" name="Time">
                              </div>

                            <div class="mb-3">
                                <label for="StationSurKey" class="col-form-label">StationSurKey</label>
                                <input type="text" class="form-control" id="StationSurKey" name="StationSurKey">
                              </div>

                            <div class="mb-3">
                                <label for="PM25" class="col-form-label">PM25</label>
                                <input type="text" class="form-control" id="PM25" name="PM25">
                              </div>

                              <div class="mb-3">
                                <label for="Average_Temperature" class="col-form-label">Average_Temperature</label>
                                <input type="text" class="form-control" id="Average_Temperature" name="Average_Temperature">
                              </div>

                              <div class="mb-3">
                                <label for="Rain_Precipitation" class="col-form-label">Rain_Precipitation</label>
                                <input type="text" class="form-control" id="Rain_Precipitation" name="Rain_Precipitation">
                              </div>

                              <div class="mb-3">
                                <label for="Wind_Speed" class="col-form-label">Wind_Speed</label>
                                <input type="text" class="form-control" id="Wind_Speed" name="Wind_Speed">
                              </div>

                               <div class="mb-3">
                                <label for="Visibility" class="col-form-label">Visibility</label>
                                <input type="text" class="form-control" id="Visibility" name="Visibility">
                              </div>

                              <div class="mb-3">
                                <label for="Cloud_Cover" class="col-form-label">Cloud_Cover</label>
                                <input type="text" class="form-control" id="Cloud_Cover" name="Cloud_Cover">
                              </div>

                              <div class="mb-3">
                                <label for="Relative_Humidity" class="col-form-label">Relative_Humidity</label>
                                <input type="text" class="form-control" id="Relative_Humidity" name="Relative_Humidity">
                              </div>

                               <div class="mb-3">
                                <label for="Year" class="col-form-label">Year</label>
                                <input type="text" class="form-control" id="Year" name="Year">
                              </div>

                               <div class="mb-3">
                                <label for="Season" class="col-form-label">Season</label>
                                <input type="text" class="form-control" id="Season" name="Season">
                              </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>

                        </form>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
      </div>
      
              <div class="div text-center">
          <h1 style="padding: 40px;">
            Feedback
          </h1>
        </div>
      
                  <table class="table text-white bg-dark">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Topic</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $host = 'localhost';
	               $user = 'root';
	               $pass = '';
	               $db = 'testproject';
	               $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	               //query to get data from the table
	               $sql = "select * from feedback";
                
                  $result = mysqli_query($mysqli, $sql);
                    if ($result->num_rows > 0): 
                  
                    ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
      
      
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px; font-family: 'Clash Display', sans-serif;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
