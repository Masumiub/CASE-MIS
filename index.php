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
</head>
<body style="font-family: 'Clash Display', sans-serif;">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-md-3">
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
    <div class="div" style="background-color: #fafafa; padding: 40px;" >
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-lg-6 col-12">
                    <h1 style="font-size: 72px;">CASE</h1>
                    <h2>Clean Air & Sustainable Environment</h2>
                    <p>Project Executing Agency  DOE   |   DSCC   |   DNCC   |   DTCA</p>
                    <a href="#" class="btn btn-primary" tabindex="-1" role="button">Login</a>
                    <a href="#" class="btn btn-success" tabindex="-1" role="button">Explore</a>
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
          <label for="cars">CHOSSE A AREA:  </label>
            <select name="area" id="area" style="height: 30px; width: 60%;">
              <option value="volvo">Dhaka</option>
              <option value="saab">Rajshahi</option>
              <option value="opel">Syllhet</option>
              <option value="audi">Rangpur</option>
              <option value="opel">Barishal</option>
              <option value="audi">Khulna</option>
            </select>

            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </div>
        </div>
        <div class="row" style="margin-top: 60px;">
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 40px;">
                <h3>Season Report</h3>
                <a href="#" class="btn btn-success btn-sm" role="button">Download</a>
            </div>
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 40px;">
                <h3>Yearly Report</h3>
                <a href="#" class="btn btn-success btn-sm" role="button">Download</a>
            </div>

            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 40px;">
                <h3>District Report</h3>
                <a href="#" class="btn btn-success btn-sm" role="button">Download</a>
            </div>
            <div class="col-md-3 col-lg-3 col-12 justify-content-center align-items-center text-center" style="border-radius: 5px; background-color: #fafafa; padding: 40px;">
                <h3>Station Report</h3>
                <a href="#" class="btn btn-success btn-sm" role="button">Download</a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>