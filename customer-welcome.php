<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&display=swap" rel="stylesheet">
   <script type="text/javascript" src="js/getmoney.js">

   </script>
    <title>Welcome to ModernMed</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    <style media="screen">
      body, html {
  height: 100%;
  background-image:linear-gradient(to bottom, rgba(0,0,0, 0.52), rgba(0,0,0, 0.52)),
  url('img/bg1.jpg');
}
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30%;
  margin-left:10%;
  margin-right:5%;
  margin-top:10px;
  display:inline;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 1);
  transition:0.3s; /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  //height:520px;
  background-color: #f1f1f1;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
}
.card .card-title{
  margin:10px;
}

.btn{
  width:30%;
  font-size:100%;
  border:1px solid white;
  /* //margin-left:9.8%;
  margin-right:9.8%; */
  margin-left:10%;
  margin-right:5%;
  margin-top:20px;
  margin-bottom:30px;
  padding-left:0%;
  padding-right:0%;

}
.btn {
  background-color: #1d2a40;

  color: white;
  opacity: 0.6;
  transition: 0.4s;
}

.btn:hover {opacity: 1}

.table{
  margin:50px;
}


/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 1000px) {
  .column {
    width: 70%;
     margin:15%;
     margin-top:5%;
    display: block;
    margin-bottom: 20px;
  }
  .btn-primary {
    width:50%;
    margin-left:25%;
    margin-right:25%;
    display:block;
  }

}

    </style>
  </head>
  <body>
    <?php session_start(); ?>
    <nav class="navbar navbar-light bg-dark" style="background-color:#6accd9;height:115px">
      <a href="customer-welcome.php" class="navbar-brand">
        <img class="img-rounded" src="img/logo.png" alt="ModernMed" width="220px" height="80px">
      </a>
      <div class="navbar-nav justify-content-end" style="float:right;margin-right:5%;margin-top:50px">
      <div class="nav-item" style="font-size:20px;color:white">
          <div class="dropdown show">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="getmoney()">
              <?php
 echo strtoupper($_SESSION['name']); ?><img src="images/<?php echo $_SESSION['image']?>" height="50px" width="50px" class="img-circle" style="margin-left:10px">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="http://localhost/WEB/customer-profile.php">View Profile</a>
              <a class="dropdown-item btn btn-secondary" onclick="" style="width:auto;margin-top:0;margin-bottom:0;margin-right:20px;text-align:center" href="customer-add-amount.php" >Rs.<span id="amount"> <?php echo $_SESSION['amount']; ?></span><br> <span>Add Money</span> </a>
              <a class="dropdown-item" href="customer-logout.php">Logout</a>
              <a class="dropdown-item" href="#">Help</a>
            </div>
          </div>
        </div>

      </div>
      </div>
    </nav>


    <a href="customer-bills.php"><button class="btn btn-primary btn-lg"  type="button" name="button" onclick=""> Check bills</button></a>
        <a href="customer-test-results.php"><button class="btn btn-primary btn-lg"  type="button" name="button" onclick=""> Check test results</button></a>


    <div class="row">
      <div class="column">
        <div class="card">
          <!-- <div class="card" style="width: 18rem;"> -->
          <img src="img/doc.jpg" class="img-rounded card-img-top" width="100%" height="250px" alt="">

              <div class="card-body">
                <h5 class="card-title"><b>Talk to Doctors</b></h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <p class="card-text">Choose among our finest doctors to start an online consultation or fix appointments.</p>
                <a href="http://localhost/WEB/customer-doctor-list.php"class="btn btn-primary" class="card-link">Start Now</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
              </div>
            </div>


        </div>
        <div class="column">
          <div class="card">
            <img src="img/med1.jpg" width="100%" class="card-img-top img-rounded" height="250px" alt="">
            <div class="card-body">
              <h5 class="card-title"><b>Online Blood Testing</b></h5>
              <p class="card-text">Apply online for a blood test for signs of any diseases or just to assess blood contents.</p>
              <a href="customer-tests.php" class="btn btn-primary" class="card-link" >Shop Now</a>
            </div>
          </div>
        </div>
        <div class="clearfix">

        </div>
        <!-- <div class="column">
          <div class="card">
            <img src="img/blood.jpg" alt="" width="100%" height="250px" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><b></b></h5>
              <p class="card-text"></p>
              <a href="customer-tests.php" class="btn btn-primary" class="card-link">Test Now</a>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <img src="img/hosp1.jpg" class="card-img-top" height="250px" alt="" width="100%">
            <div class="card-body">
              <h5 class="card-title"><b>Find Hospitals</b></h5>
              <p class="card-text">Browse hospitals near you to find the best doctors at the lowest fee.</p>
              <a href="#" class="btn btn-primary" class="card-link">Search Now</a>
            </div>
          </div>
        </div> -->

      </div>
      <!-- <table  class="table table-bordered" style="color:white;width:50%;margin-left:25%">
        <th style="background-color:white;color:black">Blood</th>
        <tr>
          <td>Blood1</td>
        </tr>

</table> -->








<script type="text/javascript" src="js/getmoney.js">

</script>
  </body>
</html>
