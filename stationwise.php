<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$Station = '';
	$AQI = '';

	//query to get data from the table
	//$sql = " SELECT Station, AVG(PM25) FROM `finaldataset` WHERE Organization='EPA' GROUP BY Station ORDER By Station;";

    $sql = " SELECT Station, AVG(PM25)
    FROM `organizationwise_data` AS O, `stationwise_data` AS S
    WHERE O.DataID = S.DataID
    GROUP BY Station ORDER By Station
    ";

    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$Station = $Station . '"'. $row['Station'].'",';
		$AQI = $AQI . '"'. $row['AVG(PM25)'] .'",';
	}

	$Station = trim($Station,",");
	$AQI = trim($AQI,",");
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

<body style="font-family: 'Clash Display', sans-serif;">

<nav class="navbar navbar-expand-lg navbar-light bg-light p-md-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CASE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" >Link</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">SignUp</button>
      </form>
    </div>
  </div>
</nav>

<div class="container md-3">
    

    <div class="div text-center">
          <h3 style="padding: 40px;">
            Box plot of the station-wise recorded PM2.5 concetration
          </h3>
          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
          <button class="btn btn-success" type="submit">Download AQI Report</button>
        
    </div>
    
    <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv"></div>
            </div>
    </div> 
        
<script>
function linspace(a,b,n) {
  return d3.range(n).map(function(i){return a+i*(b-a)/(n-1);});
}
    
var boxNumber = 23;
var boxColor = [];
var allColors = linspace(0, 360, boxNumber);
var data = [];
var yValues = [];

//Colors

for( var i = 0; i < boxNumber;  i++ ){
  var result = 'hsl('+ allColors[i] +',50%'+',50%)';
  boxColor.push(result);
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
};

//Create Y Values

for( var i = 0; i < boxNumber;  i++ ){
//    
//
//    $TmpAQI = '';
//    $sql = " SELECT Station, PM25 FROM `finaldataset` WHERE Organization='EPA' AND Station='[i]' ";
//
//    $result = mysqli_query($mysqli, $sql);
//
//	while ($row = mysqli_fetch_array($result)) {
//		$TmpAQI = $TmpAQI . '"'. $row['PM25'] .'",';
//	}
//
//	$TmpAQI = trim($TmpAQI,",");
//    
//    ?>
//  var ySingleArray = [];
    var ySingleArray = [];
    for( var j = 0; j < 10;  j++ ){
      var randomNum = getRandomArbitrary(0, 1);
      var yIndValue = 3.5*Math.sin(Math.PI * i/boxNumber) + i/boxNumber+(1.5+0.5*Math.cos(Math.PI*i/boxNumber))*randomNum;
      ySingleArray.push(yIndValue);
    }
  yValues.push(ySingleArray);
}

//Create Traces

for( var i = 0; i < boxNumber;  i++ ){
  var result = {
    y: yValues[i],
    type:'box',
    marker:{
      color: boxColor[i]
    }
  };
  data.push(result);
};

//Format the layout

var layout = {
  xaxis: {
    showgrid: false,
    zeroline: false,
    tickangle: 60,
    showticklabels: false
  },
  yaxis: {
    zeroline: false,
    gridcolor: 'white'
  },
  paper_bgcolor: 'rgb(233,233,233)',
  plot_bgcolor: 'rgb(233,233,233)',
  showlegend:false
};


Plotly.newPlot('myDiv', data, layout);
    </script>
    
    

    <div class="div text-center">
          <h3 style="padding: 40px;">
            Box plot of the monthly recorded PM2.5 concetration of a station
          </h3>
          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
          <button class="btn btn-success" type="submit">Download AQI Report</button>
    </div>
    
    <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myDiv2"></div>
            </div>
    </div> 
    
    
            <script>
            var y0 = [];
            var y1 = []; var y2 = []; var y3 = []; var y4 = []; var y5 = []; var y6 = []; var y7 = []; var y8 = [];
            var y9 = []; var y10 = []; var y11 = []; var y12 = []; var y13 = []; var y14 = []; var y15 = []; 
            var y16 = []; var y17 = []; var y18 = []; var y19 = []; var y20 = []; var y21 = []; var y22 = [];
            
            for (var i = 0; i < 50; i ++) {
                y0[i] = Math.random();
                y1[i] = Math.random() + 1;
              y2[i] = Math.random() + 2;
              y3[i] = Math.random() + 3;
              y4[i] = Math.random() + 4;
              y5[i] = Math.random() + 5;
              y6[i] = Math.random() + 6;
              y7[i] = Math.random() + 7;
              y8[i] = Math.random() + 8;
              y9[i] = Math.random() + 9;
              y10[i] = Math.random() + 10;
                y11[i] = Math.random() + 1;
              y12[i] = Math.random() + 2;
              y13[i] = Math.random() + 3;
              y14[i] = Math.random() + 4;
              y15[i] = Math.random() + 5;
              y16[i] = Math.random() + 6;
              y17[i] = Math.random() + 7;
              y18[i] = Math.random() + 8;
              y19[i] = Math.random() + 9;
              y20[i] = Math.random() + 10;
                y21[i] = Math.random() + 15;
                y22[i] = Math.random() + 16;
            }

            var trace1 = {
              y: y0,
              type: 'box'
            };

            var trace2 = {
              y: y1,
              type: 'box'
            };
            var trace3 = {
              y: y2,
              type: 'box'
            };
            var trace4 = {
              y: y4,
              type: 'box'
            };
            var trace5 = {
              y: y3,
              type: 'box'
            };
            var trace6 = {
              y: y6,
              type: 'box'
            };

            var trace7 = {
              y: y9,
              type: 'box'
            };
            var trace8 = {
              y: y8,
              type: 'box'
            };
            var trace9 = {
              y: y7,
              type: 'box'
            };
            var trace10 = {
              y: y10,
              type: 'box'
            };
            var trace11 = {
              y: y1,
              type: 'box'
            };
            var trace12 = {
              y: y5,
              type: 'box'
            };
            var trace13 = {
              y: y8,
              type: 'box'
            };
            var trace14 = {
              y: y6,
              type: 'box'
            };
            var trace15 = {
              y: y7,
              type: 'box'
            };
            var trace16 = {
              y: y4,
              type: 'box'
            };

            var trace17 = {
              y: y9,
              type: 'box'
            };
            var trace18 = {
              y: y10,
              type: 'box'
            };
            var trace19 = {
              y: y3,
              type: 'box'
            };
            var trace20 = {
              y: y5,
              type: 'box'
            };
            var trace21 = {
              y: y6,
              type: 'box'
            };
            var trace22 = {
              y: y7,
              type: 'box'
            };

            var data = [trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8, trace9, trace10, trace11, trace12, trace13, trace14, trace15, trace16, trace17, trace18, trace19, trace20, trace21, trace22];

            Plotly.newPlot('myDiv2', data);

        </script>
    
</div>

    
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




