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
    <title>Welcome to ModernMed</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
  </head>
  <style media="screen">
  body, html {
height: 100%;
background-image:linear-gradient(to bottom, rgba(0,0,0, 0.52), rgba(0,0,0, 0.52)),
url('img/bg1.jpg');
}
* {
box-sizing: border-box;
}
blockquote {
  background: #f9f9f9;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
}
blockquote:before {
  color: #ccc;
  content: open-quote;
  font-size: 4em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}
blockquote:after {
  color: #ccc;
  content: close-quote;
  font-size: 4em;
  line-height: 0.1em;
  margin-left: 0.25em;
  vertical-align: -0.4em;
}
h4{

    letter-spacing: 1px;

}
  </style>
  <body>
    <?php session_start(); ?>
    <nav class="navbar navbar-light bg-dark" style="background-color:#6accd9;height:115px">
      <a href="doctor-welcome.php" class="navbar-brand">
        <img class="img-rounded" src="img/logo.png" alt="ModernMed" width="220px" height="80px">
      </a>
      <div class="navbar-nav justify-content-end" style="float:right;margin-right:5%;margin-top:50px">
      <div class="nav-item" style="font-size:20px;color:white">
          <div class="dropdown show">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo strtoupper($_SESSION['name']); ?><img src="images/<?php echo $_SESSION['image']?>" height="50px" width="50px" class="img-circle" style="margin-left:10px">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <!-- <a class="dropdown-item" href="http://localhost/WEB/customer-profile.php">View Profile</a> -->
              <a class="dropdown-item" href="hospital-logout.php">Logout</a>
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
    <div class="jumbotron" style="margin:10%">
      <h4>Welcome back, Dr.<?php echo $_SESSION["name"];
      ?></h4>
      <a href="http://localhost/WEB/appointment-doctor-view.php" type="button" class="btn btn-primary">Check All Appoimtments</a>
      <a href="http://localhost/WEB/reply-message.php" type="button" class="btn btn-primary">Check Messages</a>

    </div>
  </body>
  </html>
