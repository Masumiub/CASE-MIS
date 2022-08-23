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
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
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
            
            <div class="card">
              <div class="card-header">
                Upload
              </div>
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
        
        
      </div>
      
      
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px; font-family: 'Clash Display', sans-serif;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
