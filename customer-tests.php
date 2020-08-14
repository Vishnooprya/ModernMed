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
    <script src="js/customer-tests.js"></script>
    <script src="js/getmoney.js" charset="utf-8"></script>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    <title>Online Blood Testing</title>
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
.clearfix {
  float:clear;;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
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
@media screen and (min-width:1001px) and (max-width:1603px)
{
  .card{
    height:320px;
  }
}
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
  <body>
    <?php session_start();
    require_once "php/connect.php";
    function add_bill($name1,$amount1)
    {
      $stmt = $conn->prepare("INSERT INTO test (p_id,t_name,t_cost,t_date) VALUES (?, ?, ?,?)");
      if($stmt){
      $stmt->bind_param("ssss",$id,$name,$cost,$date);
      $id=$_SESSION['id'];
      $name=$name1;
      $cost=$amount1;
      $date=date("Y-m-d");

      $stmt->execute();
    }
  }
    ?>


    <nav class="navbar navbar-light bg-dark" style="background-color:#6accd9;height:115px">
      <a href="customer-welcome.php" class="navbar-brand">
        <img class="img-rounded" src="img/logo.png" alt="ModernMed" width="220px" height="80px">
      </a>
      <div class="navbar-nav justify-content-end" style="float:right;margin-right:5%;margin-top:50px">
      <div class="nav-item" style="font-size:20px;color:white">
          <div class="dropdown show">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="getmoney()">
              <?php echo strtoupper($_SESSION['name']); ?><img src="images/<?php echo $_SESSION['image']?>" height="50px" width="50px" class="img-circle" style="margin-left:10px">
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="customer-profile.php">View Profile</a>
              <a class="dropdown-item btn btn-secondary" href="
              customer-add-amount.php" style="width:auto;margin-top:0;margin-bottom:0;margin-right:20px;text-align:center" href="#" >Rs.<span id="amount"><?php echo $_SESSION['amount'];?></span><br> <span>Add Money</span> </a>
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
    <div class="">

    <div class="row">


                <?php
            require_once "php/connect.php";
            $sql = "SELECT t_id,t_name,t_cost,t_desc FROM test";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            while( $record = mysqli_fetch_assoc($resultset) ) {
            ?>
              <div class="column">
                <div class="card">
                  <!-- <div class="card" style="width: 18rem;"> -->
                  <!-- <img src="img/doc.jpg" class="img-rounded card-img-top" width="100%" height="250px" alt=""> -->

                      <div class="card-body">
                        <h5 class="card-title"><u><b><?php echo $record['t_name']; ?></b></u></h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                        <p class="card-text"><?php echo $record['t_desc']; ?></p>
                        <p class="card-text"><b>Rs.<?php echo $record['t_cost']?></b></p>
                        <a href="#" name="test" data-toggle="modal" data-target="#myModal" class="doTest btn btn-primary" class="card-link" data-id="<?php echo $record['t_id']?>"  data-name="<?php echo $record['t_name']?>" data-cost="<?php echo $record['t_cost']?>">Test Now</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                        <!-- add_bill($record['t_name'],$record['t_cost']) -->
                      </div>
                    </div>
                    <div class="clearfix"></div>

                  </div>
            <?php } ?>
          </div>
        </div>

        <!-- The Modal -->
        <div id="modaltop">

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Online Blood Test Order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>





  </body>
</html>
