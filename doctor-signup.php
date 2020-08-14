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
  <title>Doctor SignUp</title>
  <link rel='icon' href='favicon.ico' type='image/x-icon'/>
</head>
<script type="text/javascript">

  if (document.readyState === "complete") {
 document.getElementById("myForm").reset();
}

function CheckOthers(val){
 var element=document.getElementById('color');
 if(val=='Other')
   element.style.display='block';
 else
   element.style.display='none';
}

</script>
<style media="screen">
  body {
font-family: "Lato", sans-serif;
}



.main-head{
height: 150px;
background:#fff;

}

.sidenav {
height: 100%;
background-color: ##6accd9;
overflow-x: hidden;
padding-top: 20px;
}


.main {
padding: 0px 10px;
}

@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
.login-form{
    margin-top: 10%;
}

.register-form{
    margin-top: 10%;
}
}

@media screen and (min-width: 768px){
.main{
    margin-left: 40%;
}

.sidenav{
    width: 40%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
}

.login-form{
    margin-top: 10%;
}

.register-form{
    margin-top: 10%;
}
}


.login-main-text{
margin-top: 10%;
padding: 60px;
color: white;
}

.login-main-text h2{
font-weight: 500;
}

.btn-black{
background-color: #6accd9 !important;
color: white;
}
</style>
  <body>
    <?php
  //  echo "el";
     session_start();
     ?>
    <nav class="navbar navbar-light bg-dark" style="height:115px">
      <a href="hospital-welcome.php" class="navbar-brand">
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
              <a class="dropdown-item" href="customer-logout.php">Logout</a>
              <a class="dropdown-item" href="#">Help</a>
            </div>
          </div>
        </div>
        <!-- <div class="">
          <?php echo $_SESSION["name"];
          ?>
        </div> -->
      </div>
      </div>
    </nav>

    <div class="sidenav" style="background-image:
    linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 19, 93, 0.73)),
    url('img/doc1.jpg');background-repeat:no-repeat;background-size:cover;">
    <img src="img/logo.png" class="img-rounded" alt="" style="margin:20px;" >

         <div class="login-main-text" >
            <h2 style="font-size:40px">New Doctor<br> Registration</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
              <form  action="http://localhost/WEB/php/doctor-signup.php" method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                  <div class="form-group">
                    <label>Doctor's Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Doctor's Name">
                 </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label>Gender :  </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="g1" value="Male"checked>Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" id="g2" value="Female">Female
                      </label>
                  </div>
                  <div class="form-group">
                    <!-- <label>Qualification</label> -->
                    <textarea name="qualification" rows="5" cols="45" placeholder="Qualification"></textarea>

                  </div>

                  <div class="form-group" >
                    <label>Specialization</label>
                    <select name="specialization" id="specialization" class="form-control" onchange="CheckOthers(this.value);">
                  <option value="Cardiologist">Cardiologist</option>
                  <option value="Dentist">Dentist</option>
                  <option value="Dermatologist">Dermatologist</option>
                  <option value="Gynaecologist">Gynaecologist</option>
                  <option value="Neurologist">Neurologist</option>
                  <option value="Paediatrician">Paediatrician</option>
                  <option value="Physiologist">Physiologist</option>
                  <option value="Other"><b>Other</b></option>


                  </select>
                  <div class="form-group"  name="color" id="color" style="display:none">
                    <br>
                    <input type="text"class="form-control"name="specialization2" value="" placeholder="if other(s),please specify">

                  </div>

                  </div>










                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label>Phone Number</label>
                     <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label>Cost Per Hour</label>
                     <input type="text" class="form-control" id="appcost" name="appcost" placeholder="Appointment Cost" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label>Upload Photo</label>
                     <input type="file" class="form-control" name="photo" id="photo">
                  </div>
                  <!-- <button type="submit" class="btn btn-black">Login</button> -->
                  <button type="submit" class="btn btn-black" onclick="validate();">Register</button>


               </form>

               <!-- <p>Don't have an account? <a href="#">Register Here</a></p> -->
            </div>
            <div class="" style="padding:25px">

            </div>
         </div>
      </div>




  </body>
</html>
