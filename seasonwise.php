<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$SEASON = '';
	$AQI = '';

	//query to get data from the table
	$sql = " SELECT PM25 FROM `stationwise_data` WHERE Season = 'Winter' ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		//$SEASON = $SEASON . '"'. $row['Season'].'",';
		$AQI = $AQI . '"'. $row['PM25'] .'",';
	}

	//$SEASON = trim($SEASON,",");
	$AQI = trim($AQI,",");
?>


<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$SEASON = '';
	$AQI2 = '';

	//query to get data from the table
	$sql2 = " SELECT PM25 FROM `stationwise_data` WHERE Season = 'Spring' ";
    $result = mysqli_query($mysqli, $sql2);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AQI2 = $AQI2 . '"'. $row['PM25'] .'",';
	}


	$AQI2 = trim($AQI2,",");
?>

<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$SEASON = '';
	$AQI3 = '';

	//query to get data from the table
	$sql3 = " SELECT PM25 FROM `stationwise_data` WHERE Season = 'Summer' ";
    $result = mysqli_query($mysqli, $sql3);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AQI3 = $AQI3 . '"'. $row['PM25'] .'",';
	}


	$AQI3 = trim($AQI3,",");
?>

<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$SEASON = '';
	$AQI4 = '';

	//query to get data from the table
	$sql4 = " SELECT PM25 FROM `stationwise_data` WHERE Season = 'Autumn' ";
    $result = mysqli_query($mysqli, $sql4);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AQI4 = $AQI4 . '"'. $row['PM25'] .'",';
	}


	$AQI4 = trim($AQI4,",");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CASE MIS</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/clash-display" rel="stylesheet">
    
    <script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


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
          
        <li class="nav-item">
          <a class="nav-link" href="login.php" tabindex="-1" >Upload Data</a>
        </li>


      </ul>
      <form class="d-flex">

        <a href="signup.php" class="btn btn-success" tabindex="-1" role="button">SignUp</a>
          
      </form>
    </div>
  </div>
</nav>

<div class="container md-3">
        <div class="div text-center">
          <h1 style="padding: 40px;">
            Seasonwise AQI Report.
          </h1>
            <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
        <button class="btn btn-success" type="submit" id="download">Download AQI Report</button>
            <br><br>
            <label for="time" class="form-label">Time:</label>
            
            <select aria-label="Default select example" style="width: 120px;">
            <option value="volvo">Monthly</option>
            <option value="saab">Yearly</option>
            </select>
            
            <label for="time" class="form-label">Season:</label>
            <select aria-label="Default select example" style="width: 120px;">
            <option value="volvo">All Season</option>
            <option value="saab">Yearly</option>
            </select>
            <br>
            <button class="btn btn-danger btn-sm" type="submit">Search</button>
        </div>
        
    
        <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv" ></div>
            </div>
        </div> 


    <script>
        var trace1 = {
          y: [<?php echo $AQI; ?>],
          type: 'box',
          name: 'Winter',
          jitter: 0.3,
          pointpos: -1.8,
          marker: {
            color: 'rgb(7,40,89)'
          },
          boxpoints: 'all'
        };

        var trace2 = {
          y: [<?php echo $AQI2; ?>],
          type: 'box',
          name: 'Spring',
          marker: {
            color: '#800080'
          },
          boxpoints: false
        };

        var trace3 = {
          y: [<?php echo $AQI3; ?>],
          type: 'box',
          name: 'Summer',
          marker: {
            color: '#3D9970',
            outliercolor: 'rgba(219, 64, 82, 0.6)',
            line: {
              outliercolor: 'rgba(219, 64, 82, 1.0)',
              outlierwidth: 2
            }
          },
          boxpoints: 'suspectedoutliers'
        };

        var trace4 = {
          y: [<?php echo $AQI4; ?>],
          type: 'box',
          name: 'Autumn',
          marker: {
            color: '#FF4136'
          },
          boxpoints: 'Outliers'
        };



        var data = [trace1, trace2, trace3, trace4];

        var layout = {
          title: 'Seasonwise AQI Data Report'
        };

        Plotly.newPlot('myDiv', data, layout);
    </script>
    
    


    

    
<!--
    <div class="div text-center">
          <h3 style="padding: 40px;">
            Box plot of the monthly recorded PM2.5 concetration of a station
          </h3>
          <button class="btn btn-primary" type="submit">Upload CSV File</button>
          <button class="btn btn-success" type="submit">Download AQI Report</button>
    </div>
    
    <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv"></div>
            </div>
    </div> 
-->
    
    </div>
    
    
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
    
    
    
    <script>
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("myDiv");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'seasonwiseAQIreport.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
    </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




