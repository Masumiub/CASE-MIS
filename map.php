<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

    $Division = '';
	$Location = '';
	$AQI = '';
    $LONGI = '';
    $LATI = '';

	//query to get data from the table
	$sql = "SELECT * FROM `mapaqi` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

        $Division = $Division . '"'. $row['Division'].'",';
		$Location = $Location . '"'. $row['Location'].'",';
		$AQI = $AQI . '"'. $row['AQI'] .'",';
        
        $LONGI = $LONGI . '"'. $row['LONGI'] .'",';
        $LATI = $LATI . '"'. $row['LATI'] .'",';
	}

    $Division = trim($Division,",");
	$Location = trim($Location,",");
	$AQI = trim($AQI,",");

    $LONGI = trim($LONGI,",");
    $LATI = trim($LATI,",");

    $conn = mysqli_connect("localhost", "root", "", "testproject");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CASE MIS - Mapwise AQI</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/clash-display" rel="stylesheet">
    
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    
    

    <style>
        #table-div{
            display: none;
        }
    </style>

    
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
             Areawise average AQI data
          </h1>
            <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
            <button class="btn btn-success" type="submit" id="download">Download AQI Report</button>
<!--
            <button class="btn btn-danger" onclick="show()">Show Table</button>
            <script>
                function show(){
                    document.getElementById('table-div').style.display = "block";
                }
                
            </script>
-->
        </div>
        
        <div class="row text-white" style="padding: 0px; margin-top: 40px;" id="all">
            <div class="col-md-10 col-lg-10 col-12">
                <div id="myDiv" style=""></div>
            </div>
<!--style="width: 700px; height: 433px;"-->
            <script>
                      google.charts.load('current', {
                        'packages':['geochart'],
                        'mapsApiKey': 'AIzaSyCxdwmjX_paSOGfTwybgyiv3BIXuqtFXVA'
                      });
                      google.charts.setOnLoadCallback(drawRegionsMap);

                      function drawRegionsMap() {
                        var data = google.visualization.arrayToDataTable([
                          ['Division','Location', 'AQI'],
//                          ['BD-A', 56],
//                          ['BD-B', 205],
//                          ['BD-C', 220],
//                          ['BD-D', 110],
//                          ['BD-E', 155],
//                          ['BD-F', 45],
//                          ['BD-G', 60],
                            <?php
                              $sqlmap = "SELECT * FROM `mapaqi`";
                              $fire = mysqli_query($conn, $sqlmap);
                              while($res = mysqli_fetch_assoc($fire)){
                                    echo "[' " .$res['Division']." ', ' " .$res['Location']." ',".$res['AQI']."],";
                              }
                            ?>
                        ]);
                        
                        var options = {
                          region: 'BD', // Africa
                          resolution: 'provinces',
                          displayMode: [<?php echo $Location;?>],
                          colorAxis: {colors: ['#00853f', 'black', '#e31b23']},
                          backgroundColor: '#3d3d3d', //#81d4fa
                          datalessRegionColor: '#3d3d3d', //#f8bbd0
                          defaultColor: '#f5f5f5',
                        };

                        var chart = new google.visualization.GeoChart(document.getElementById('myDiv'));
                        chart.draw(data, options);
                      };
            </script>
            
<!--        plotly.js map------------------------------------------------------------>
        <!--  <script>

                var data = [{
                    type: 'scattergeo',
                    mode: 'markers+text',
                    text: [<?php/* echo $AQI;*/?>
                //        'Rangpur', 'Rajshahi', 'Dhaka', 'Kulna', 'Barishal',
                //       'Sylhet', 'Chittagong'
                    ],
                    lon: [<? php /*echo $LONGI; */?>],
                    lat: [<? php/* echo $LATI; */?>],

                    marker: {

                        size: 14,
                        color: [
                            '#bebada', '#fdb462', '#fb8072', '#d9d9d9', 
                            '#b3de69', '#8dd3c7', '#80b1d3'
                        ],
                        line: {
                            width: 1
                        }
                    },
                    name: 'Areawise AQI',
                    textposition: [
                        'top right', 'top left', 'top center', 'bottom right', 
                        'top left', 'bottom right', 'bottom left'
                    ],
                }];

                var layout = {
                    title: 'Division wise AQI',
                    font: {
                        family: 'Droid Serif, serif',
                        size: 16
                    },
                    titlefont: {
                        size: 26
                    },
                    geo: {
                        scope: 'bangladesh',
                        resolution: 50,
                        lonaxis: {
                            'range': [89, 91]
                        },
                        lataxis: {
                            'range': [22,25]
                        },
                        showrivers: true,
                        rivercolor: '#fff',
                        showlakes: true,
                        lakecolor: '#fff',
                        showland: true,
                        landcolor: '#EAEAAE',
                        countrycolor: '#d3d3d3',
                        countrywidth: 1.5,
                        subunitcolor: '#d3d3d3'
                    }
                };

                Plotly.newPlot('myDiv', data, layout);

                //plotly.js map----------------------------------------------------------
                </script> -->
<!--
        </div> 
    <div class="row text-white" id ="table-div">
-->
        <div class="col-md-2 col-lg-2 col-12">
            <div class="page-header text-center">
                <h4>Mapwise AQI Report</h4>
            </div>
            <table class="table text-white bg-dark">
              <thead>
                <tr>
                  <th scope="col">Location</th>
                  <th scope="col">AQI</th>
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
	               $sql = "select * from mapaqi";
                
                  $result = mysqli_query($mysqli, $sql);
                    if ($result->num_rows > 0): 
                  
                    ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
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
        </div>
    </div> 
    
    
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
            const invoice = this.document.getElementById("all");
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'areawiseAQIreport.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'ledger', orientation: 'landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




