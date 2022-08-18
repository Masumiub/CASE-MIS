<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	
	$conn = mysqli_connect($servername, $username, $password);
    

	$dbname = 'testproject';
	mysqli_select_db ( $conn , $dbname);

    if (!$conn) {
	    die("select db connection failed: " . mysqli_connect_error());
	}
    else{
        echo "Connected!";
    }

//create dataset table --------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

//	$sql = "CREATE TABLE IF NOT EXISTS `datasets` (
//	  `division` VARCHAR(50) NOT NULL,
//	  `AQI` VARCHAR(50) NOT NULL,
//	  `ID` INT NOT NULL AUTO_INCREMENT,
//	  PRIMARY KEY (`ID`))";
//
//	if(mysqli_query($conn, $sql)){
//	    echo "Table created successfully<br>";
//	} else {
//	    echo "Error creating table: " . mysqli_error($conn). "<br>";
//	}
//			
//	$query = "INSERT INTO datasets (division, AQI) VALUES
//	('Barishal', '88.96'), ('Chittagong', '93.70') ,('Dhaka', '93.46'),('Mymensingh', '95.55'),('Rajshahi', '78.34'),('Rangpur', '94.55'),('Sylhet', '95.61')";
//	
//	$conn->query($query);
//	mysqli_close($conn);
//




//create YEARLYAQI table --------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

	$sql = "CREATE TABLE IF NOT EXISTS `YEARLYAQI` (
	  `YEARS` VARCHAR(50) NOT NULL,
	  `AQI` VARCHAR(50) NOT NULL,
	  `ID` INT NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`ID`))";

	if(mysqli_query($conn, $sql)){
	    echo "Table created successfully<br>";
	} else {
	    echo "Error creating table: " . mysqli_error($conn). "<br>";
	}
			
	$query = "INSERT INTO YEARLYAQI (YEARS, AQI) VALUES
	('2017', '9.07'), ('2018', '15.07') ,('2019', '7.46'),('2020', '6.55')";
	
	$conn->query($query);
	mysqli_close($conn);


//create MAPAQI table --------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

	$sql = "CREATE TABLE IF NOT EXISTS `MAPAQI` (
	  `DIVISION` VARCHAR(50) NOT NULL,
	  `AQI` VARCHAR(50) NOT NULL,
      `LONGI` VARCHAR(50) NOT NULL,
      `LATI` VARCHAR(50) NOT NULL,
	  `ID` INT NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`ID`))";

	if(mysqli_query($conn, $sql)){
	    echo "Table created successfully<br>";
	} else {
	    echo "Error creating table: " . mysqli_error($conn). "<br>";
	}
			
	$query = "INSERT INTO MAPAQI (DIVISION, AQI, LONGI, LATI) VALUES
	('Rangpur', '45', '89.275589', '25.744860'), ('Rajshahi', '155', '89.249298', '24.006355') ,('Dhaka', '220', '90.412521', '23.810331'),('Khulna', '110', '89.550003', '22.820000'), ('Barishal', '56', '90.3666652', '22.6999972'), ('Sylhet', '60', '91.869034', '24.894802'), ('Chittagong', '205', '91.7999968', '22.3666652')";
	
	$conn->query($query);
	mysqli_close($conn);
    
    


//create users table --------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

//  $servername = "localhost";
//	$username = "root";
//	$password = "";
//  $dbname = 'testproject';

$conn = mysqli_connect($servername, $username, $password, $dbname);
$message='';

	$sql = "CREATE TABLE IF NOT EXISTS `USERS` (
	  `username` VARCHAR(50) NOT NULL,
	  `fullname` VARCHAR(50) NOT NULL,
      `email` VARCHAR(50) NOT NULL,
      `dob` VARCHAR(15) NOT NULL,
      `designation` VARCHAR(50) NOT NULL,
      `password` VARCHAR(15) NOT NULL,
	  `sNo` INT NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`sNo`))";

	if(mysqli_query($conn, $sql)){
	    echo "Table created successfully<br>";
	} else {
	    echo "Error creating table: " . mysqli_error($conn). "<br>";
	}
	mysqli_close($conn);





/*

if(isset($_POST["upload"])){
	if($_FILES['final_train_data(Manipulated)']['name']){
		$filename = explode(".", $_FILES['final_train_data(Manipulated)']['name']);
		if(end($filename) == "csv"){
			$handle = fopen($_FILES['final_train_data(Manipulated)']['tmp_name'], "r");
			while($data = fgetcsv($handle)){
				$time = mysqli_real_escape_string($conn,$data[0]);
				$pm = mysqli_real_escape_string($conn,$data[1]);	
				$average_temperature = mysqli_real_escape_string($conn,$data[2]);	
				$rain_precipitation = mysqli_real_escape_string($conn,$data[3]);
                $wind_speed = mysqli_real_escape_string($conn,$data[4]);
                $visibility = mysqli_real_escape_string($conn,$data[5]);
                $cloud_cover = mysqli_real_escape_string($conn,$data[6]);
                $relative_humidity = mysqli_real_escape_string($conn,$data[7]);
                $station = mysqli_real_escape_string($conn,$data[8]);
                $division = mysqli_real_escape_string($conn,$data[9]);
                $organization = mysqli_real_escape_string($conn,$data[10]);
                $season = mysqli_real_escape_string($conn,$data[11]);
                
                
				$query = "
					UPDATE finaldataset
					SET pm = '$pm',
					average_temperature = '$average_temperature',
                    rain_precipitation = '$rain_precipitation',
					wind_speed = '$wind_speed'',
                    visibility = '$visibility',
					cloud_cover = '$cloud_cover',
                    relative_humidity = '$relative_humidity',
					station = '$station',
                    division = '$division',
					organization= '$organization',
                    season = '$season',
                    
					WHERE time = '$time'
				";
				mysqli_query($conn, $query );
			}
			fclose($handle);
			header("location: db.php?updation=1");
		}
		else{
		  $message = '<label class="text-danger"> Please select CSV File </label>';
        }
	}
}
	else{
		$message = '<label class="text-danger"> Please select File 	</label>';
	}
}


if(isset($_GET["updation"])){
	$message = '<label class="text-danger"> File updated </label>';
}
$query = "SELECT * FROM finaldataset";
$res = mysqli_connect($conn, $query);


*/
?>

<html>
    
    
     <head>
  <title>Update Mysql Database through Upload CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
    	<body>

		<form method="post" enctype="multipart/form-data">
			<p>
			<label>Please Select File</label>
			<input type = "file" name="final_train_data(Manipulated)" />
			<input type="submit" name="upload" class="btn btn-info" value = "upload"/>
			</p>
		</form>

<!--
			<?php echo $message; ?>
		<table>
			<tr>
			<th>time</th>
			<th>pm25</th>
			<th>average_temperature</th>
            <th>rain_precipitation</th>
			<th>wind_speed</th>
			<th>visibility</th>
            <th>cloud_cover</th>
			<th>relative_humidity</th>
			<th>station</th>
            <th>division</th>
			<th>organization</th>
			<th>season</th>
			</tr>

		<?php 
//            while($row  = mysqli_fetch_array($res)){
//            echo '
//			<tr>
//			<td>'.$row["time"].'</td>
//			<td>'.$row["pm25"].'</td>
//			<td>'.$row["average_temperature"].'</td>
//            
//            <td>'.$row["rain_precipitation"].'</td>
//			<td>'.$row["wind_speed"].'</td>
//			<td>'.$row["visibility"].'</td>
//            
//            <td>'.$row["cloud_cover"].'</td>
//			<td>'.$row["relative_humidity"].'</td>
//			<td>'.$row["station"].'</td>
//            
//            <td>'.$row["division"].'</td>
//			<td>'.$row["organization"].'</td>
//			<td>'.$row["season"].'</td>
//			</tr>
//		';
//            }
		?>

		
		</table>-->
	</body>
    
    
    
</html>
