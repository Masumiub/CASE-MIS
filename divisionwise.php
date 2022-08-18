<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$Division = '';
	$AQI = '';

	//query to get data from the table
	$sql = "SELECT O.Division, AVG(PM25) FROM `organizationwise_data` AS O, `stationwise_data` AS S WHERE O.DataID = S.DataID GROUP BY O.Division";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$Division = $Division . '"'. $row['Division'].'",';
		$AQI = $AQI . '"'. $row['AVG(PM25)'] .'",';
	}

	$Division = trim($Division,",");
	$AQI = trim($AQI,",");
?>


<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'testproject';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$YEARBarishal = '';
	$AQIBarishal = '';

	//query to get data from the table
	$sql2 = "SELECT YEAR, AVG(PM25) FROM `stationwise_data` WHERE Division = 'Barishal' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql2);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARBarishal = $YEARBarishal . '"'. $row['YEAR'].'",';
		$AQIBarishal = $AQIBarishal . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARBarishal = trim($YEARBarishal,",");
	$AQIBarishal = trim($AQIBarishal,",");

//=====================================================================================================
	$YEARChittagong = '';
	$AQIChittagong = '';

	//query to get data from the table
	$sql3 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Chittagong' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql3);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARChittagong = $YEARChittagong . '"'. $row['YEAR'].'",';
		$AQIChittagong = $AQIChittagong . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARChittagong = trim($YEARChittagong,",");
	$AQIChittagong = trim($AQIChittagong,",");

//=====================================================================================================

	$YEARDhaka = '';
	$AQIDhaka = '';

	//query to get data from the table
	$sql4 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Dhaka' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql4);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARDhaka = $YEARDhaka . '"'. $row['YEAR'].'",';
		$AQIDhaka = $AQIDhaka . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARDhaka = trim($YEARDhaka,",");
	$AQIDhaka = trim($AQIDhaka,",");
//=====================================================================================================

	$YEARKhulna = '';
	$AQIKhulna = '';

	//query to get data from the table
	$sql5 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Khulna' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql5);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARKhulna = $YEARKhulna . '"'. $row['YEAR'].'",';
		$AQIKhulna = $AQIKhulna . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARKhulna = trim($YEARKhulna,",");
	$AQIKhulna = trim($AQIKhulna,",");

//=====================================================================================================
	$YEARMymensingh = '';
	$AQIMymensingh = '';

	//query to get data from the table
	$sql6 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Mymensingh' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql6);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARMymensingh = $YEARMymensingh . '"'. $row['YEAR'].'",';
		$AQIMymensingh = $AQIMymensingh . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARMymensingh = trim($YEARMymensingh,",");
	$AQIMymensingh = trim($AQIMymensingh,",");

//=====================================================================================================
	$YEARRajshahi = '';
	$AQIRajshahi = '';

	//query to get data from the table
	$sql7 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Rajshahi' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql7);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARRajshahi = $YEARRajshahi . '"'. $row['YEAR'].'",';
		$AQIRajshahi = $AQIRajshahi . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARRajshahi = trim($YEARRajshahi,",");
	$AQIRajshahi = trim($AQIRajshahi,",");

//=====================================================================================================
	$YEARRangpur = '';
	$AQIRangpur = '';

	//query to get data from the table
	$sql8 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Rangpur' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql8);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARRangpur = $YEARRangpur . '"'. $row['YEAR'].'",';
		$AQIRangpur = $AQIRangpur . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARRangpur = trim($YEARRangpur,",");
	$AQIRangpur = trim($AQIRangpur,",");

//=====================================================================================================


    $YEARSylhet = '';
	$AQISylhet = '';

	//query to get data from the table
	$sql9 = "SELECT AVG(PM25), YEAR FROM `stationwise_data` WHERE Division = 'Sylhet' GROUP BY YEAR";
    $result = mysqli_query($mysqli, $sql9);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$YEARSylhet = $YEARSylhet . '"'. $row['YEAR'].'",';
		$AQISylhet = $AQISylhet . '"'. $row['AVG(PM25)'] .'",';
	}

	$YEARSylhet = trim($YEARSylhet,",");
	$AQISylhet = trim($AQISylhet,",");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CASE MIS - DIVISION</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/clash-display" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
            Divisionwise Daily AQI Reports
          </h1>
          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
          <button class="btn btn-success" type="submit" id="download">Download AQI Report</button>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-12 col-lg-12 col-12 text-center">
                <p>Divisionwise Daily AQI</p>
                <div id="myDiv"></div>
            </div>
        </div>
          
<!--class="animate__animated animate__backInDown"-->
          <script>
              
              var trace1 = {
                x: [<?php echo $Division; ?>],
                y: [<?php echo $AQI; ?>],
                type: 'scatter'
                };

                var data = [trace1];

                Plotly.newPlot('myDiv', data);
          </script>
          

        <div class="div text-center">
          <h1 style="padding: 40px;">
            Divisionwise AQI Reports-Time-based
          </h1>
          <a href="login.php" class="btn btn-primary" role="button">Upload CSV File</a>
        <button class="btn btn-success" type="submit" id="download2">Download AQI Report</button>
        </div>


        <div class="row" style="margin-top: 40px;">
            <div class="col-md-12 col-lg-12 col-12" id="second-graph">
                <div id="chart_div1" ></div> 
            </div>
            
            <script>
                var trace1 = {
                  x: [<?php echo $YEARBarishal; ?>],
                  y: [<?php echo $AQIBarishal; ?>],
                    name: "Barishal",
                  type: 'scatter'
                };

                var trace2 = {
                  x: [<?php echo $YEARChittagong; ?>],
                  y: [<?php echo $AQIChittagong; ?>],
                    name: "Chittagong",
                  type: 'scatter'
                };
                
                var trace3 = {
                  x: [<?php echo $YEARDhaka; ?>],
                  y: [<?php echo $AQIDhaka; ?>],
                    name: "Dhaka",
                  type: 'scatter'
                };
                
                var trace4 = {
                  x: [<?php echo $YEARKhulna; ?>],
                  y: [<?php echo $AQIKhulna; ?>],
                    name: "Khulna",
                  type: 'scatter'
                };
                
                var trace5 = {
                  x: [<?php echo $YEARMymensingh; ?>],
                  y: [<?php echo $AQIMymensingh; ?>],
                    name: "Mymensingh",
                  type: 'scatter'
                };
                
                var trace6 = {
                  x: [<?php echo $YEARRajshahi; ?>],
                  y: [<?php echo $AQIRajshahi; ?>],
                    name: "Rajshahi",
                  type: 'scatter'
                };
                
                var trace7 = {
                  x: [<?php echo $YEARRangpur; ?>],
                  y: [<?php echo $AQIRangpur; ?>],
                    name: "Rangpur",
                  type: 'scatter'
                };
                
                var trace8 = {
                  x: [<?php echo $YEARSylhet; ?>],
                  y: [<?php echo $AQISylhet; ?>],
                    name: "Sylhet",
                  type: 'scatter'
                };
                var data = [trace1,trace2,trace3,trace4,trace5,trace6,trace7,trace8];

                Plotly.newPlot('chart_div1', data);
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
            const invoice = this.document.getElementById("myDiv");
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'divisionwiseAQIreport.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
    }
    </script>
    
    <script>
    window.onload = function () {
    document.getElementById("download2")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("chart_div1");
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'AlldivisionAQIreport.pdf',
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
