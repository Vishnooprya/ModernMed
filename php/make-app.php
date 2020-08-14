<?php
require_once('connect.php');
session_start();
if($_SESSION['amount']<$_POST['cost'])
{
  $error="Not enough balance";
}
else {
  echo "ok";
$sql="insert into appointments(d_id,p_id,date_and_time,cost) values(?,?,?,?)";
if($stmt=$conn->prepare($sql))
{
  echo "ok2";
  $stmt->bind_param("iisi",$_POST['did'],$_POST['pid'],$_POST['date'],$_POST['cost']);
  if($stmt->execute())
  {

  }
  else {
    echo $stmt->error;
  }
}
else {
  echo $conn->error;
}
$sql2="update patient_account set p_amount=p_amount-? where p_id=?";
if($stmt2=$conn->prepare($sql2))
{
  //echo "ok";
  $stmt2->bind_param("ii",$_POST['cost'],$_SESSION['id']);
  $stmt2->execute();
//  $_SESSION['amount']=
}
$sql3="insert into patient_bills(p_id,b_name,b_cost,b_date) values(?,?,?,?)";
if($stmt3=$conn->prepare($sql3))
{
  $date=date("Y-m-d");
 //echo $date;
  $stmt3->bind_param("isis",$_SESSION['id'],$val,$cost,$date);
  $val="Appointment with Dr.".$_POST['dname'];
  $cost=$_POST['cost'];
  if($stmt3->execute())
  {

  }
  else {
    echo $stmt3->error;
  };
}
$sql4="select p_amount from patient_account where p_id=?";
if($stmt4=$conn->prepare($sql4))
{
  $stmt4->bind_param("i",$_SESSION['id']);
  $stmt4->execute();
  $res=$stmt4->get_result();
  while($row=$res->fetch_assoc())
  {
    $_SESSION['amount']=$row['p_amount'];
  }
}
header("location:http://localhost/WEB/appointment-list.php");


}
 ?>
