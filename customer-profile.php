<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/customer-profile.js">

    </script>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    <title>My Profile</title>

  </head>
  <style media="screen">
            body, html
             {
                height: 100%;
                background-image:linear-gradient(to bottom, rgba(0,0,0, 0.52), rgba(0,0,0, 0.52)),
                url('img/bg1.jpg');
              }
          *   {
                box-sizing: border-box;
              }

          body{
                font-family: Arial, Helvetica, sans-serif;
              }
        .jumbotron
        {
          width:80%;
          margin:5% 10% 5% 10%;
        }
        @media screen and (max-width: 1000px) {
          .jumbotron
          {
            width:90%;
            margin:3% 5% 3% 5%;
          }
        }

  </style>
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

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Enter the new <span id="attr" name="attr"></span> to update.
        <form class="" action="http://localhost/WEB/php/cus-profile.php" method="post">
          <input type="hidden" name="param" id="hid-val" value="">
          <input type="text" name="val" id="attr" value="" autocomplete="off">
          <button class="btn btn primary" type="submit" >Update</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      </div>


    </div>
  </div>
</div>
<div class="modal fade" id="PasswordModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="http://localhost/WEB/php/cus-profile.php" method="post">
          <input type="hidden" name="param" id="hid" value="password">
          <input type="password" name="val" placeholder="Enter current Password"><br><br>
          <input type="password" name="new_pw1"  placeholder="Enter New Password"><br><br>
          <input type="password" name="new_pw2"  value="" autocomplete="off" placeholder="Retype New Password"><br><br>
          <button class="btn btn primary" type="submit" >Update</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      </div>


    </div>
  </div>
</div>

<div class="modal fade" id="PhotoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Photo</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="http://localhost/WEB/php/cus-profile.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="param" value="photo">
          <input type="hidden" name="val" value="">
          <input type="file" name="photo" id="photo">
          <!-- <input type="password" name="new_pw1"  placeholder="Enter New Password"><br><br>
          <input type="password" name="new_pw2"  value="" autocomplete="off" placeholder="Retype New Password"><br><br>-->
          <br><br>
          <button class="btn btn primary" type="submit" >Update</button>

       </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      </div>


    </div>
  </div>
</div>






    <div class="jumbotron">
  <h1 class="display-4" align="center" style="font-family: 'Roboto', sans-serif;">My Profile</h1>
  <div class="row">
    <?php
    require_once "php/connect.php";
    $sql = "SELECT p_id,p_name,p_dob,p_gender,p_build,p_area,p_state,p_pincode,p_email,p_phone,p_pw,p_image FROM patient where p_id=".$_SESSION['id'];

    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    while( $record = mysqli_fetch_assoc($resultset) ) {
      if($record['p_image']=="empty")
      {
        if($record['p_gender']=="Male")
        {
          $record['p_image']='male.png';
        }
        if($record['p_gender']=="Female")
        {
          $record['p_image']='female.png';
        }
      }
    //  echo $record['p_name'];
      ?>

      <div class="column">

        <div class="container" align="center">
          <img class="img-circle" src="images/<?php echo $record['p_image']?>" alt="" align="center" width="200px" height="200px">
          <br>
          <a class="summa" href="#" data-toggle="modal"  data-target="#PhotoModal" data-type="Photo">Update Picture</a>
        </div>
      </div>
        <div class="column">
          <table class="table" style="border:none;">
            <tbody>

            <tr>
              <td>Full Name:</td>
              <td> <?php echo $record['p_name']?></td>
            </tr>
            <tr>
              <td>DOB:</td>
              <td><?php echo $record['p_dob']?></td>
            </tr>
            <tr>
              <td>Gender:</td>
              <td><?php echo $record['p_gender']?></td>
            </tr>
            <tr>
              <tr>
                <td>Password:</td>
                <td><button class="btn btn-primary" name="button" data-toggle="modal" data-target="#PasswordModal" data-type="password">Change Password</button></td>
              </tr>
              <td>Address:</td>
              <td><?php echo $record['p_build']?></td>
              <td><a class="summa btn" href="#" data-toggle="modal" data-type="Building Number and Street" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>

            </tr>
            <tr>
              <td>District:</td>
              <td><?php echo $record['p_area']?></td>
              <td><a class="summa btn" href="#" data-toggle="modal" data-type="District" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>

            </tr>
            <tr>
              <td>State:</td>
              <td><?php echo $record['p_state']?></td>
              <td><a class="summa btn" href="#" data-toggle="modal" data-type="State" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>

            </tr>
            <tr>
              <td>Pincode:</td>
              <td><?php echo $record['p_pincode']?></td>
              <td><a class="summa btn" href="#" data-toggle="modal" data-type="Pincode" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>

            </tr>
            <tr>
              <td>E-mail:</td>
              <td><?php echo $record['p_email']?></td>
              <td><a class="summa btn" href="#"  data-toggle="modal" data-type="Email" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>

            </tr>
            <tr>
              <td>Phone Number:</td>
              <td><?php echo $record['p_phone']?></td>
          <td><a class="summa btn" href="#"  data-toggle="modal" data-type="Phone Number" data-target="#myModal"><i class="fa fa-edit"></i> Edit</a></td>
         </tr>
          </tbody>



        </table>
        </div>
        </div>
  <?php }?>
  </div>


    </div>

  </div>
</div>

  </body>
</html>
