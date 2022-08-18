<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$YEAR = '';
	$AQI = '';

	//query to get data from the table
	$sql = " SELECT AVG(PM25), Time FROM `organizationwise_data` as o, `stationwise_data` as s WHERE o.DataID = s.DataID AND o.Organization = 'PurpleAir' AND s.Season = 'Summer' AND s. Year = '2020' group by Time";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEAR = $YEAR . '"'. $row['Time'].'",';
		$AQI = $AQI . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEAR = trim($YEAR,",");
	$AQI = trim($AQI,",");

//=========================================================================================================
	$AQIIQAir = '';

	//query to get data from the table
	$sql2 = " SELECT AVG(PM25), Time FROM `organizationwise_data` as o, `stationwise_data` as s WHERE o.DataID = s.DataID AND o.Organization = 'IQAir' AND s.Season = 'Summer' AND s. Year = '2020' group by Time";
    $result = mysqli_query($mysqli, $sql2);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AQIIQAir = $AQIIQAir . '"'. $row['AVG(PM25)'] .'",';
	}

	$AQIIQAir = trim($AQIIQAir,",");
//=========================================================================================================
	$AQIEPA = '';

	//query to get data from the table
	$sql3 = " SELECT AVG(PM25), Time FROM `organizationwise_data` as o, `stationwise_data` as s WHERE o.DataID = s.DataID AND o.Organization = 'EPA' AND s.Season = 'Summer' AND s. Year = '2020' group by Time";
    $result = mysqli_query($mysqli, $sql3);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AQIEPA = $AQIEPA . '"'. $row['AVG(PM25)'] .'",';
	}

	$AQIEPA = trim($AQIEPA,",");

//=========================================================================================================
	$PMof18 = '';

	//query to get data from the table
	$sql4 = " SELECT PM25 FROM `stationwise_data` WHERE YEAR='2018' ";
    $result = mysqli_query($mysqli, $sql4);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$PMof18 = $PMof18 . '"'. $row['PM25'] .'",';
	}

	$PMof18 = trim($PMof18,",");
//=========================================================================================================
	$PMof19 = '';

	//query to get data from the table
	$sql5 = " SELECT PM25 FROM `stationwise_data` WHERE YEAR='2019' ";
    $result = mysqli_query($mysqli, $sql5);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$PMof19 = $PMof19 . '"'. $row['PM25'] .'",';
	}

	$PMof19 = trim($PMof19,",");
//=========================================================================================================
	$PMof20 = '';

	//query to get data from the table
	$sql6 = " SELECT PM25 FROM `stationwise_data` WHERE YEAR='2020' ";
    $result = mysqli_query($mysqli, $sql6);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$PMof20 = $PMof20 . '"'. $row['PM25'] .'",';
	}

	$PMof20 = trim($PMof20,",");


//=========================================================================================================
	$PMof20 = '';

	//query to get data from the table
	$sql6 = " SELECT PM25 FROM `stationwise_data` WHERE YEAR='2020' ";
    $result = mysqli_query($mysqli, $sql6);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$PMof20 = $PMof20 . '"'. $row['PM25'] .'",';
	}

	$PMof20 = trim($PMof20,",");

//=========================================================================================================
	$AllPMEpa = '';

	//query to get data from the table
	$sql7 = " SELECT PM25 
    FROM `stationwise_data` as s, `organizationwise_data` as o
    WHERE s.DataID = o.DataID 
    AND Organization = 'EPA' ";
    $result = mysqli_query($mysqli, $sql7);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AllPMEpa = $AllPMEpa . '"'. $row['PM25'] .'",';
	}

	$AllPMEpa = trim($AllPMEpa,",");

//=========================================================================================================
	$AllPMPurpleAir = '';

	//query to get data from the table
	$sql8 = " SELECT PM25 
    FROM `stationwise_data` as s, `organizationwise_data` as o
    WHERE s.DataID = o.DataID 
    AND Organization = 'PurpleAir' ";
    $result = mysqli_query($mysqli, $sql8);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AllPMPurpleAir = $AllPMPurpleAir . '"'. $row['PM25'] .'",';
	}

	$AllPMPurpleAir = trim($AllPMPurpleAir,",");

//=========================================================================================================
	$AllPMIQAir= '';

	//query to get data from the table
	$sql9 = " SELECT PM25 
    FROM `stationwise_data` as s, `organizationwise_data` as o
    WHERE s.DataID = o.DataID 
    AND Organization = 'IQAir' ";
    $result = mysqli_query($mysqli, $sql9);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {
		$AllPMIQAir = $AllPMIQAir . '"'. $row['PM25'] .'",';
	}

	$AllPMIQAir = trim($AllPMIQAir,",");
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
            A comparison between multiple data sources.
          </h1>
          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
          <button class="btn btn-success" type="submit">Download AQI Report</button>
        </div>
        
        <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="chart_div1"></div>
            </div>
        </div>
          
          <script>
              var trace1 = {
                  x: [<?php echo $YEAR; ?>],
                  y: [<?php echo $AQI; ?>],
                  mode: 'lines',
                  name: 'PurpleAir',
                  line: {
                    dash: 'solid',
                    width: 3
                  }
                };

                var trace2 = {
                  x: [<?php echo $YEAR; ?>],
                  y: [<?php echo $AQIIQAir; ?>],
                  mode: 'lines',
                  name: 'IQAir',
                  line: {
                    dash: 'dashdot',
                    width: 3
                  }
                };

                var trace3 = {
                  x: [<?php echo $YEAR; ?>],
                  y: [<?php echo $AQIEPA; ?>],
                  mode: 'lines',
                  name: 'EPA',
                  line: {
                    dash: 'solid',
                    width: 3
                  }
                };

                
                var data = [trace1, trace2, trace3];

                var layout = {
                  title: 'Different Data Sources',
                  xaxis: {
                    //range: [0.75, 5.25],
                    autorange: true
                  },
                  yaxis: {
                    //range: [0, 18.5],
                    autorange: true
                  },
                  legend: {
                    y: 0.5,
                    traceorder: 'reversed',
                    font: {
                      size: 16
                    }
                  }
                };

                Plotly.newPlot('chart_div1', data, layout);
          </script>

          
        <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="chart_div2"></div> 
            </div>
        </div>
          
          
          <script>
          var trace1 = {
              /*x: [7, 8, 9, 4, 5],*/
              y: [<?php echo $PMof18; ?>],
              mode: 'markers',
              type: 'scatter',
              name: '2018',
              text: ['A-1', 'A-2', 'A-3', 'A-4', 'A-5'],
              marker: { size: 8 }
            };

            var trace2 = {
              
              y: [<?php echo $PMof19; ?>],
              mode: 'markers',
              type: 'scatter',
              name: '2019',
              text: ['B-a', 'B-b', 'B-c', 'B-d', 'B-e'],
              marker: { size: 8 }
            };
              
            var trace3 = {
              
              y: [<?php echo $PMof20; ?>],
              mode: 'markers',
              type: 'scatter',
              name: '2020',
              text: ['B-a', 'B-b', 'B-c', 'B-d', 'B-e'],
              marker: { size: 8 }
            };

            var data = [ trace1, trace2, trace3 ];

            var layout = {
              xaxis: {
                /*range: [ 0.75, 5.25 ]*/
                autorange: true
              },
              yaxis: {
                autorange: true
                /*range: [0, 8]*/
              },
              title:'Year wise PM 2.5'
            };

            Plotly.newPlot('chart_div2', data, layout);
          
          </script>
          

          
        <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="chart_div3"></div> 
            </div>
          
            
          <script>
          
                var y0 = [<?php echo $AllPMEpa; ?>];
                var y1 = [<?php echo $AllPMPurpleAir; ?>];
                var y2 = [<?php echo $AllPMIQAir; ?>];
              
                var trace1 = {
                  y: y0,
                  type: 'box'//,
                  //name = 'EPA'
                };

                var trace2 = {
                  y: y1,
                  type: 'box'//,
                  //  name = 'PurpleAir'
                };
              
                var trace3 = {
                  y: y2,
                  type: 'box'//,
                  //  name = 'IQAir'
                };

                var data = [trace1, trace2, trace3];

                Plotly.newPlot('chart_div3', data);
          </script>
        
          
        </div>
      </div>

    
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
