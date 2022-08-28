<html>
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
      
    <script src='https://cdn.plot.ly/plotly-2.14.0.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV8Y11E1I4bqYiQJrroMydoAFyEqV3ajY&callback=initMap"></script>
      
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
            <div class="div text-center">
          <h1 style="padding: 40px;">
            Routewise AQI
          </h1>
    </div>
    <div id="myDiv"></div>
    
  
    
    <script>
    d3.csv(
	"https://raw.githubusercontent.com/Masumiub/CASE-MIS/main/epa_daily(Manipulated).csv",
	function(err, rows) {
		function unpack(rows, key) {
			return rows.map(function(row) {
				return row[key];
			});
		}

		var data = [
			{
				type: "scattermapbox",
				text: unpack(rows, "mean"),
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: "fuchsia", size: 14 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 38, lon: -90 }, zoom: 5 },
			margin: { r: 0, t: 0, b: 0, l: 0 }
		};

		Plotly.newPlot("myDiv", data, layout);
	}
);

    </script>
    </body>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
