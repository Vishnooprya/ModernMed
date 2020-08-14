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
    <title>Test Results</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    <style media="screen">
    body, html
     {
        height: 100%;
        background-image:linear-gradient(to bottom, rgba(0,0,0, 0.52), rgba(0,0,0, 0.52)),
        url('img/bg1.jpg');
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
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo strtoupper($_SESSION['name']); ?><img src="images/<?php echo $_SESSION['image']?>" height="50px" width="50px" class="img-circle" style="margin-left:10px">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="http://localhost/WEB/customer-profile.php">View Profile</a>
              <a class="dropdown-item" href="customer-logout.php">Logout</a>
              <a class="dropdown-item" href="#">Help</a>
            </div>
          </div>
        </div>
        <div class="">
          <? php echo $_SESSION["name"];
          ?>
        </div>
      </div>
      </div>
    </nav>

    <div class="jumbotron" style="border-radius:10px;margin:4%">
      <h2 style="letter-spacing:2px;text-shadow:2px 2px #82b08e" align="center"><b>TEST RESULTS</b></h2>
      <div class="">
        <p align="center">Please check your mail for detailed results.</p>

      </div>
      <table class="table table-bordered table-hover">
        <thead style="background-color:grey">
          <th><b>Test Name</b></th>
          <th>Date</th>
          <th>Test Result</th>
        </thead>
        <tbody>
          <?php
          $sql="select * from patient_bills where p_id=?";
          require_once('php/connect.php');
          if($stmt=$conn->prepare($sql))
          {
            $stmt->bind_param("i",$_SESSION['id']);
            $stmt->execute();
            $result=$stmt->get_result();
            while($row=$result->fetch_assoc())
            {
              if($row['b_result']=='Normal'){
              echo "<tr><td>".$row['b_name']."</td>
              <td>".$row["b_date"]."</td>
              <td>".$row["b_result"]."</td></tr>";
            }
            if($row['b_result']=='Abnormal')
            {
              echo "<tr style='background-color:pink'><td>".$row['b_name']."</td>
              <td>".$row["b_date"]."</td>
              <td>".$row["b_result"]."</td></tr>";
            }

            }
          }


          ?>

        </tbody>

      </table>


    </div>

  </body>
</html>
