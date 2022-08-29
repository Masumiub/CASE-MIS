<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$Station = '';
	$AQIMonth1 = '';

    $sql = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '1' ";

    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$AQIMonth1 = $AQIMonth1 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth1 = trim($AQIMonth1,",");

//////////////////////////////////////////////////////////////////////////////////////////
	$AQIMonth2 = '';

    $sql2 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '2' ";

    $result2 = mysqli_query($mysqli, $sql2);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result2)) {

		$AQIMonth2 = $AQIMonth2 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth2 = trim($AQIMonth2,",");

//////////////////////////////////////////////////////////////////////////////////////////
	$AQIMonth3 = '';

    $sql3= " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '3' ";

    $result3 = mysqli_query($mysqli, $sql3);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result3)) {

		$AQIMonth3 = $AQIMonth3 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth3 = trim($AQIMonth3,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth4 = '';

    $sql4 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '4' ";

    $result4 = mysqli_query($mysqli, $sql4);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result4)) {

		$AQIMonth4 = $AQIMonth4 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth4 = trim($AQIMonth4,",");
//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth5 = '';

    $sql5 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '5' ";

    $result5 = mysqli_query($mysqli, $sql5);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result5)) {

		$AQIMonth5 = $AQIMonth5 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth5 = trim($AQIMonth5,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth6 = '';

    $sql6 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '6' ";

    $result6 = mysqli_query($mysqli, $sql6);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result6)) {

		$AQIMonth6 = $AQIMonth6 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth6 = trim($AQIMonth6,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth7 = '';

    $sql7 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '7' ";

    $result7 = mysqli_query($mysqli, $sql7);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result7)) {

		$AQIMonth7 = $AQIMonth7 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth7 = trim($AQIMonth7,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth8 = '';

    $sql8 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '8' ";

    $result8 = mysqli_query($mysqli, $sql8);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result8)) {

		$AQIMonth8 = $AQIMonth8 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth8 = trim($AQIMonth8,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth9 = '';

    $sql9 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '9' ";

    $result9 = mysqli_query($mysqli, $sql9);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result9)) {

		$AQIMonth9 = $AQIMonth9 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth9 = trim($AQIMonth9,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth10 = '';

    $sql10 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '10' ";

    $result10 = mysqli_query($mysqli, $sql10);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result10)) {

		$AQIMonth10 = $AQIMonth10 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth10 = trim($AQIMonth10,",");

//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth11 = '';

    $sql11 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '11' ";

    $result11 = mysqli_query($mysqli, $sql11);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result11)) {

		$AQIMonth11 = $AQIMonth11 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth11 = trim($AQIMonth11,",");


//////////////////////////////////////////////////////////////////////////////////////////

	$AQIMonth12 = '';

    $sql12 = " SELECT PM25 from stationwise_data, station where station.StationSurKey = stationwise_data.StationSurKey and station.StationID = 1 and MONTH(Time) = '12' ";

    $result12 = mysqli_query($mysqli, $sql12);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result12)) {

		$AQIMonth12 = $AQIMonth12 . '"'. $row['PM25'] .'",';
	}

	$AQIMonth12 = trim($AQIMonth12,",");
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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>


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

        <a href="signup.php" class="btn btn-success" tabindex="-1" role="button">SignUp</a>
          
      </form>
    </div>
  </div>
</nav>

<div class="container md-3">
    

    <div class="div text-center">
          <h3 style="padding: 40px;">
              Box plot of the monthly recorded PM2.5 concetration of a station
          </h3>
          <button class="btn btn-success" type="submit" id="download">Download AQI Report</button>
        
    </div>
    
    <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv"></div>
            </div>
    </div> 
        
        <script>
        var trace1 = {
          y: [<?php echo $AQIMonth1; ?>],
          type: 'box',

          jitter: 0.3,
          pointpos: -1.8,
          marker: {
            color: '#0dfafd'
          },
          boxpoints: 'all'
        };

        var trace2 = {
          y: [<?php echo $AQIMonth2; ?>],
          type: 'box',

          marker: {
            color: '#ff91af'
          },
          boxpoints: false
        };

        var trace3 = {
          y: [<?php echo $AQIMonth3; ?>],
          type: 'box',

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
          y: [<?php echo $AQIMonth4; ?>],
          type: 'box',

          marker: {
            color: '#FF4136'
          },
          boxpoints: 'Outliers'
        };
            
        var trace5 = {
          y: [<?php echo $AQIMonth5; ?>],
          type: 'box',

          marker: {
            color: '#0dfafd'
          },
          boxpoints: 'Outliers'
        };
        
        var trace6 = {
          y: [<?php echo $AQIMonth6; ?>],
          type: 'box',

          marker: {
            color: '#3D9970'
          },
          boxpoints: 'Outliers'
        };

         var trace7 = {
          y: [<?php echo $AQIMonth7; ?>],
          type: 'box',

          marker: {
            color: '#FF4136'
          },
          boxpoints: 'Outliers'
        };

         var trace8 = {
          y: [<?php echo $AQIMonth8; ?>],
          type: 'box',

          marker: {
            color: '#0dfafd'
          },
          boxpoints: 'Outliers'
        };
            
         var trace9 = {
          y: [<?php echo $AQIMonth9; ?>],
          type: 'box',
    
          marker: {
            color: '#3D9970'
          },
          boxpoints: 'Outliers'
        };
            
        var trace10 = {
          y: [<?php echo $AQIMonth10; ?>],
          type: 'box',

          marker: {
            color: '#FF4136'
          },
          boxpoints: 'Outliers'
        };

         var trace11 = {
          y: [<?php echo $AQIMonth11; ?>],
          type: 'box',

          marker: {
            color: '#3D9970'
          },
          boxpoints: 'Outliers'
        };
            
        var trace12 = {
          y: [<?php echo $AQIMonth12; ?>],
          type: 'box',

          marker: {
            color: '#0dfafd'
          },
          boxpoints: 'Outliers'
        };

        var data = [trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8, trace9, trace10, trace11, trace12];

        var layout = {
                plot_bgcolor:"#3d3d3d",
                paper_bgcolor:"#3d3d3d",
                title: 'Seasonwise AQI Data Report',
                font: {
                        family: 'Arial',
                        size: 13,
                        color: '#ffffff'
                }
        };

        Plotly.newPlot('myDiv', data, layout);
    </script>
    
    <script>
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("myDiv");
            //console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'stationAQIreportMonthly.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
    }
    </script>


    <div class="div text-center">
          <h3 style="padding: 40px;">
            Box plot of the station-wise recorded PM2.5 concetration
          </h3>
          <button class="btn btn-success" type="submit">Download AQI Report</button>
    </div>
    
<!--
    <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv2"></div>
            </div>
    </div> 
-->
    

    
</div>

    
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>









