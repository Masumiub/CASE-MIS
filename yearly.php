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
	$sql = "SELECT Year, AVG(PM25) FROM `stationwise_data` GROUP BY Year";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$AQI = $AQI . '"'. $row['AVG(PM25)'] .'",';
        $YEAR = $YEAR . '"'. $row['Year'].'",';
	}

    $AQI = trim($AQI,",");
	$YEAR = trim($YEAR,",");
	
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
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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

<div class="container md-3" id="all">
        <div class="div text-center">
          <h1 style="padding: 40px;">
             Yearly Average AQI Data
          </h1>
<!--          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>-->
         <button class="btn btn-success" type="submit" id="download">Download AQI Report</button>
        </div>
        
        <div class="row" style="padding: 40px;">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="myPlot" ></div>
            </div>
            
            <script>
                var xArray = [<?php echo $YEAR; ?>];
                var yArray = [<?php echo $AQI; ?>];

                var data = [{
                  x:xArray,
                  y:yArray,
                  type:"bar"
                }];

                var layout = {
                    plot_bgcolor:"#3d3d3d",
                    paper_bgcolor:"#3d3d3d",
                    title:"Yearly Average AQI Data Visualization",
                    font: {
                        family: 'Arial',
                        size: 13,
                        color: '#ffffff'
                    }
                };

                Plotly.newPlot("myPlot", data, layout);
                </script>
        </div> 
    
        <div class="div text-center">
            <div class="col-md-12 col-lg-12 col-12">
                <div id="Newgraph"></div>
            </div>
            
            <?php 

              $con = new mysqli('localhost','root','','testproject');

              $division = " ";

              if(isset($_POST['Submit'])) {
                $division = $_POST['area'];
              }
            
            	$YEARarea = '';
                $AQIarea = '';

                //query to get data from the table
                $sql2 = "SELECT Year, AVG(PM25) FROM `stationwise_data`, `station` 
                where stationwise_data.StationSurKey = station.StationSurKey
                and Division = '$division'
                GROUP BY Year";
                $result2 = mysqli_query($mysqli, $sql2);

                //loop through the returned data
                while ($row = mysqli_fetch_array($result2)) {

                    $YEARarea = $YEARarea . '"'. $row['AVG(PM25)'] .'",';
                    $AQIarea = $AQIarea . '"'. $row['Year'].'",';
                }

                $AQIarea = trim($AQIarea,",");
                $YEARarea = trim($YEARarea,",");
            
            ?>
            
            <form id="s" method="post" style="margin-top: 40px;">
         <select name="area" id="area" style="height: 30px; width: 60%;">
             <option value="">Select a Division:</option>
              <option value="Dhaka" id="Dhaka">Dhaka</option>
             <option value="Mymensingh" id="Mymensingh">Mymensingh</option>
              <option value="Rajshahi" id="Rajshahi">Rajshahi</option>
              <option value="Sylhet" id="Sylhet">Sylhet</option>
              <option value="Rangpur" id="Rangpur">Rangpur</option>
              <option value="Barishal" id="Barishal">Barishal</option>
              <option value="Khulna" id="Khulna">Khulna</option>
             <option value="Chittagong" id="Chittagong">Chittagong</option>
            </select>
            <input type="submit" name="Submit" value="Submit">
            </form>
            
                <script>
                var xArray = [<?php echo $AQIarea; ?>];
                var yArray = [<?php echo $YEARarea; ?>];

                var data = [{
                  x:xArray,
                  y:yArray,
                  type:"bar"
                }];

                var layout = {
                    plot_bgcolor:"#3d3d3d",
                    paper_bgcolor:"#3d3d3d",
                    title:"Yearly Average AQI Data Visualization Division",
                    font: {
                        family: 'Arial',
                        size: 13,
                        color: '#ffffff'
                    }
                };

                Plotly.newPlot("Newgraph", data, layout);
                </script>
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
            const invoice = this.document.getElementById("myPlot");
            //console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'yearAQIreport.pdf',
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














