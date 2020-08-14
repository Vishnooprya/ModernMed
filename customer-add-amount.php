<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&display=swap" rel="stylesheet">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>

    <title>Add Amount</title>
    <style media="screen">
    body, html {
      height: 100%;
      background-image:linear-gradient(to bottom, rgba(0,0,0, 0.52), rgba(0,0,0, 0.52)),
      url('img/bg1.jpg');
    }
    </style>
    <script type="text/javascript" src="js/getmoney.js">

    </script>
    <script type="text/javascript">
    $(document).on('ready',function(){
      getmoney();


    });

    </script>
    <script type="text/javascript">
      function goback()
      {
        window.alert('Money added');
        window.history.back();
      }
    </script>
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
              <?php
 echo strtoupper($_SESSION['name']); ?><img src="images/<?php echo $_SESSION['image']?>" height="50px" width="50px" class="img-circle" style="margin-left:10px">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="http://localhost/WEB/customer-profile.php">View Profile</a>
              <a class="dropdown-item" href="customer-logout.php">Logout</a>
              <a class="dropdown-item" href="#">Help</a>
            </div>
          </div>
        </div>

      </div>
      </div>
    </nav>
    <div class="jumbotron" style="margin:5%">
      <div class="jumbotron" align="center" style="font-size:20px;letter-spacing:2px;">
        <span style="border:1px solid black;padding:10px 10px 10px 10px;border-radius:10px"><b>Current Balance: Rs. <span id="amount"></span></b></span>

      </div>
      <h3 align="center" style="letter-spacing:1px">Please Enter Card Details to Add Money</h3>
      <form class="" action="php/customer-add-amount.php" method="post">
        <div class="form-group">
           <label>Bank Name</label>
           <input type="text"   class="form-control" placeholder="Bank Name" required>
        </div>
        <div class="form-group">
           <label>Account Holder Name</label>
           <input type="text"  class="form-control" placeholder="Account Holder Name" required>
        </div>
        <div class="form-group">
           <label>Card Number</label>
           <input type="text"  class="form-control" placeholder="Card Number" required>
        </div>
        <div class="form-group">
           <label>Expiry Date</label>
           <input type="month"  class="form-control" required>
        </div>
        <div class="form-group">
           <label>CVV</label>
           <input type="text"  class="form-control" placeholder="CVV" required>
        </div>
        <div class="form-group">
           <label>Enter Amount</label>
           <input type="text"  class="form-control" placeholder="0.00" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary" name="button" onclick="goback()">Pay Now</button>


      </form>

    </div>


  </body>
</html>
