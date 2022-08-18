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
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
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
    
    <div class="div" style="background-color: #fafafa; padding: 40px;" id="header">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-lg-6 col-12">
                    <h1 style="font-size: 72px;">CASE</h1>
                    <h2>Clean Air & Sustainable Environment</h2>
                    <p>Project Executing Agency  DOE   |   DSCC   |   DNCC   |   DTCA</p>
                    <a href="login.php" class="btn btn-primary" tabindex="-1" role="button">Login</a>
                    <a href="signup.php" class="btn btn-success" tabindex="-1" role="button">SignUp</a>
                </div>
                <div class="col-md-6 col-lg-6 col-12">
                    <img src="img/header.jpg" alt="header" width="100%">
                </div>
            </div>
        </div>
    </div>

    <div class="container " style="margin-top: 60px;">

        <div class="row align-items-center" style="padding: 40px;">
          <div class="col-md-12 col-lg-12 col-12 text-center">
          <h1>View Areawise AQI Report</h1>
          <h6>CHOSSE A AREA:  </h6>
              
<!--            <select name="area" id="area" class="form-select" aria-label="Default select example">-->
         <select name="area" id="area" style="height: 30px; width: 60%;">
              <option value="Dhaka" id="Dhaka">Dhaka</option>
              <option value="Rajshahi" id="Rajshahi">Rajshahi</option>
              <option value="Syllhet" id="Syllhet">Syllhet</option>
              <option value="Rangpur" id="Rangpur">Rangpur</option>
              <option value="Barishal" id="Barishal">Barishal</option>
              <option value="Khulna" id="Khulna">Khulna</option>
            </select>
              
            <button id="click" class="btn btn-primary btn-sm" type="submit">Search</button>
              
            <div id="empty" style="font-size: 72px; color: white; margin-top: 40px; border-radius: 15px;"></div>
            <div id="empty2" style="font-size: 42px;  margin-top: 20px; border-radius: 15px;"></div>
              
            <script>
              var clicked = document.getElementById("click");
              clicked.addEventListener("click", function(event){
                  var empted = document.getElementById("empty");
                  var para = document.createElement('p');
                  
                  var e = document.getElementById("area");
                  var value = e.options[e.selectedIndex].value;
                  
                  var empted2 = document.getElementById("empty2");
                  var para2 = document.createElement('h1');
                  
                  if(value === "Dhaka"){
                        para.innerHTML = "Dhaka - AQI: 97 ";
                        empted.append(para);
                      
                        para2.innerHTML = "Air Pollution Level: Moderate";
                        empted2.append(para2);
                      
                      document. getElementById('empty').style.backgroundColor = '#0d6efd';
                  }
                  else if(value === "Rajshahi"){
                        para.innerHTML = "Rajshahi - AQI: 59 ";
                        empted.append(para);
                      
                        para2.innerHTML = "Air Pollution Level: Moderate";
                        empted2.append(para2);
                      document. getElementById('empty').style.backgroundColor = '#0d6efd';
                  }
                  else if(value === "Syllhet"){
                        para.innerHTML = "Sylhet - AQI: 18 ";
                        empted.append(para);
                      
                        para2.innerHTML = "Air Pollution Level: Good";
                        empted2.append(para2);
                        document. getElementById('empty').style.backgroundColor = '#198754';
                        
                  }
                  else if(value === "Rangpur"){
                        para.innerHTML = "Rangpur - DNA";
                        empted.append(para); 
                      document. getElementById('empty').style.backgroundColor = 'grey';
                  }
                  else if(value === "Barishal"){
                        para.innerHTML = "Barishal - AQI: 28";
                        empted.append(para);    
                      
                         para2.innerHTML = "Air Pollution Level: Good";
                        empted2.append(para2);
                      document. getElementById('empty').style.backgroundColor = '#198754';
                  }
                  else if(value === "Khulna"){
                        para.innerHTML = "Khulna - AQI: 19"
                        empted.append(para);  

                      
                        para2.innerHTML = "Air Pollution Level: Good";
                        empted2.append(para2);
                      document. getElementById('empty').style.backgroundColor = '#198754';
                  }

              })
                
              </script>
        </div>
        </div>
        <div class="row" style="margin-top: 60px;">
            <div class="col-md-3 col-lg-3 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                      <img src="img/sun.png" style="width: 70px;">
                    <h5 class="card-title">Seasonwise Report</h5>
                    <a href="seasonwise.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>    

            <div class="col-md-3 col-lg-3 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                      <img src="img/cloudy-day.png" style="width: 70px;">
                    <h5 class="card-title">Yearwise Report</h5>
                    <a href="yearly.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>  
<!--
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 35px; border-color: white;">
                <h3>Yearly Report</h3>
                <a href="yearly.php" class="btn btn-success btn-sm" role="button">VIEW</a>
            </div>
-->
            <div class="col-md-3 col-lg-3 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                      <img src="img/hot.png" style="width: 70px;">
                    <h5 class="card-title">Divisionwise Report</h5>
                    <a href="divisionwise.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>  
            
<!--
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 35px; border-color: white;">
                <h3>District Report</h3>
                <a href="map.php" class="btn btn-success btn-sm" role="button">VIEW</a>
            </div>
-->
            
            <div class="col-md-3 col-lg-3 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <img src="img/storm.png" style="width: 70px;">
                    <h5 class="card-title">Stationwise Report</h5>
                    <a href="stationwise.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>  
<!--
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 35px; border-color: white;">
                <h3>Station Report</h3>
                <a href="stationwise.php" class="btn btn-success btn-sm" role="button">VIEW</a>
            </div>
-->
        </div>
        
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                      <img src="img/rainy-day.png" style="width: 90px;">
                    <h5 class="card-title">Compare AQIs of Data Sources</h5>
                    <a href="comparison.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>  
            
            <div class="col-md-6 col-lg-6 col-12">
                <div class="card text-center">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                      <img src="img/cloudy.png" style="width: 90px;">
                    <h5 class="card-title">Overall Bangladesh AQI Report</h5>
                    <a href="map.php" class="btn btn-success btn-sm" role="button">VIEW</a>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="py-5" style="background-color: #0d6efd; margin-top: 90px;">
    <div class="container">
      <h5 class="m-0 text-center text-white">Copyright &copy; CASE MIS - Designed &amp; Developed by Md. Masum Musfique</h5>
    </div>
  </footer>
    
    
<!--
     <script>
    function generatePDF() {
         var doc = new jsPDF();
          doc.fromHTML(document.getElementById("header"), // page element which you want to print as PDF
          15,
          15, 
          {
            'width': 170
          },
          function(a) 
           {
            doc.save("OverallBangladeshMapAqI.pdf");
          });
        }
</script>   
-->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
