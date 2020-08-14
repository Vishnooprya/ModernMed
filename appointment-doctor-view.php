<?php
require_once('php/connect.php');
include('header2.php');
//session_start();
$time_slots=array('11:00-12:00','12:00-13:00','14:00-15:00','15:00-16:00');
$today=new DateTime('+1day');
$tod=$today->format('d-m-Y');
$tomo = new DateTime('+2day');
$tomorrow = $tomo->format('d-m-Y');
$next_day=new DateTime('+3day');
$next=$next_day->format('d-m-Y');
$final_slots=array();
for($x=0;$x<count($final_slots);$x++)
{
  echo $final_slots[$x]."<br>";
}
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
$sql="select patient.p_id,date_and_time from appointments inner join patient on patient.p_id=appointments.p_id where d_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("i",$_SESSION['id']);
  if($stmt->execute())
  {
    $res=$stmt->get_result();
    while($row=$res->fetch_assoc())
    {
      array_push($check,$row['date_and_time']);
    }
  }
  else {
    echo $stmt->error;
  }

}
else {
  echo $conn->error;
}


$ans=array_diff($final_slots,$check);
if(strcmp($check[4],$final_slots[1]))
{
  echo "smae";
}
else {
  echo $check[4]." ".$final_slots[1];
}

for($x=0;$x<count($ans);$x++)
{
  echo "ans".$ans[$x]."<br>";
}
$an=array_intersect($final_slots,$check);


echo "ok";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>See Appointments</title>

  </head>
  <body>
    <div class="jumbotron" style="margin:5% 5% 5% 5%">
<h2 align="center">Your Appointments for the next 3 days:</h2>
<div class="" style="width:80%;margin:10%">
<form >



  <?php



  foreach ($final_slots as $x) {
    if(in_array($x,$ans)){

 //echo $x;
      echo '<button style="height:150px;width:250px;background-color:rgba(137, 240, 137,0.6)" name="date" value="'.$x.'">'.$x.'</button>';

    }
    else {
      $sql2="select p_id from appointments where date_and_time=?";
      if($stmt2=$conn->prepare($sql2))
      {
        $stmt2->bind_param("s",$x);
        $stmt2->execute();
        $res=$stmt2->get_result();
        $row2=$res->fetch_assoc();

      }
    //  echo "not".$x;
      echo '<button style="height:150px;width:250px;background-color:rgba(255, 135, 159,0.6)" value="'.$x.'">'.$x.$row['p_id'].'</button>';

    }
  }
   ?>
 </form>
</div>




    </div>

  </body>
</html>
