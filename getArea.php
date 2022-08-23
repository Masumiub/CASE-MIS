<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    <style>
        body{
            color: white;
        }
        
    </style>
    </head>

<body>
    <div class="container">
    

<div class="row text-center">
    
    <div class="col-lg-12 col-md-12 col-12">
    <?php
$mysqli = new mysqli("localhost", "root", "", "testproject");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT ROUND(AVG(PM25), 2), ROUND(AVG(Average_Temperature),2), ROUND(AVG(Rain_Precipitation),2), ROUND(AVG(Wind_Speed), 2), ROUND(AVG(Visibility), 2), 
ROUND(AVG(Cloud_Cover), 2), ROUND(AVG(Relative_Humidity), 2)
FROM `stationwise_data` , `station`
Where stationwise_data.StationSurKey = station.StationSurKey
AND station.Division = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($PM25, $Average_Temperature, $Rain_Precipitation, $Wind_Speed, $Visibility, $Cloud_Cover, $Relative_Humidity);
$stmt->fetch();
$stmt->close();

echo " <h1> AQI: " . $PM25 . " </h1>";

echo "<table class='table table-dark table-bordered table-hover'>
<tr>
<th>PM2.5 </th>
<th>Average_Temperature</th>
<th>Rain_Precipitation</th>
<th>Wind_Speed</th>
<th>Visibility</th>
<th>Cloud_Cover</th>
<th>Relative_Humidity</th>
</tr>";

echo "<td>" . $PM25 . "</td>";
echo "<td>" . $Average_Temperature . "</td>";
echo "<td>" . $Rain_Precipitation . "</td>";
echo "<td>" . $Wind_Speed . "</td>";
echo "<td>" . $Visibility . "</td>";
echo "<td>" . $Cloud_Cover . "</td>";
echo "<td>" . $Relative_Humidity . "</td>";
echo "</table>";

?>
    </div>
    </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>