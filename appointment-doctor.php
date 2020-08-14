<?php
require_once('php/connect.php');
include('header.php');
//session_start();
$time_slots=array('11:00-12:00','12:00-13:00','14:00-15:00','15:00-16:00');
$today=new DateTime('+1day');
$tod=$today->format('d-m-Y');
$tomo = new DateTime('+2day');
$tomorrow = $tomo->format('d-m-Y');
$next_day=new DateTime('+3day');
$next=$next_day->format('d-m-Y');
$final_slots=array();
for($x=0;$x<4;$x++)
{
  $var=$tod." ".$time_slots[$x];
  array_push($final_slots,$var);
}
for($x=0;$x<4;$x++)
{
  $var=$tomorrow." ".$time_slots[$x];
  array_push($final_slots,$var);
}
for($x=0;$x<4;$x++)
{
  $var=$next." ".$time_slots[$x];
  array_push($final_slots,$var);
}


$check=array();
$sql="select date_and_time from appointments where d_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("i",$_POST['did']);
  $stmt->execute();
  $res=$stmt->get_result();
  while($row=$res->fetch_assoc())
  {
    array_push($check,$row['date_and_time']);
  }
}
$ans=array_diff($final_slots,$check);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fix Appointment</title>
    <script type="text/javascript">
    function make_app()
    {
      var date=this.value;
      $.get({
      method: 'GET',
      url: 'php/make-app.php',

      // query parameters go under "data" as an Object
      data: {
        date:date,
        did:<?php echo $_POST['did']?>,
        pid:<?php echo $_SESSION['id']?>,
        cost:<?php echo $_POST['dcost']?>,
        dname:'<?php echo $_POST['dname']?>'
      }
  });

    }
    function show_error()
    {
      window.alert("Slot already booked. Please choose another time-slot.");
    }
    function show_success()
    {
      window.alert("Success !!");
      //this.style.background_color=rgba(255, 135, 159,0.6);

      location.reload();
    }

    </script>
  </head>
  <body>
    <div class="jumbotron" style="margin:5% 5% 5% 5%">
<h3 align="center">Choose your Slot for an Appointment with <b>Dr.<?php echo $_POST['dname']?></b></h3>
<h5 align="center">Cost per Hour: Rs.<?php echo $_POST['dcost'];?></h5>
<h6 align="center">You can choose for appointment at any time slot within the next three days.</h6>
<div class="" style="width:80%;margin:10%">
<form action="http://localhost/WEB/php/make-app.php" method="post">
  <input type="hidden" name="dname" value="<?php echo $_POST['dname']?>">
  <input type="hidden" name="cost" value="<?php echo $_POST['dcost']?>">
  <input type="hidden" name="did" value="<?php echo $_POST['did']?>">
  <input type="hidden" name="pid" value="<?php echo $_SESSION['id']?>">


  <?php
  foreach ($final_slots as $x) {
    if(in_array($x,$ans)){
      echo '<button type="submit" id="'.$x.'" onclick="show_success()" style="height:150px;width:250px;background-color:rgba(137, 240, 137,0.6)" name="date" value="'.$x.'">'.$x.'</button>';

    }
    else {
      echo '<button type="button"  onclick="show_error()" style="height:150px;width:250px;background-color:rgba(255, 135, 159,0.6)" value="'.$x.'">'.$x.'</button>';

    }
  }
   ?>
 </form>
</div>




    </div>

  </body>
</html>
