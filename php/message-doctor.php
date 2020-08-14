<?php
session_start();
require_once('connect.php');
$did=$_POST['did'];
$pid=$_POST['pid'];
$date=date('Y-m-d');
$symp=$_POST['symptoms'];
$no=$_POST['noofdays'];
$clari=$_POST['clari'];
$rep="Not replied";
if($_SESSION['amount']<40)
{
  $error="Not enough balance";
}
else {
$sql="insert into patient_to_doctor_message(p_id,d_id,datetime,symptoms,no_of_days,extras,replied_status)
values(?,?,?,?,?,?,?) ";
if($stmt=$conn->prepare($sql))
{

  $stmt->bind_param("iisssss",$pid,$did,$date,$symp,$no,$clari,$rep);
  $rep="Not replied";

  $stmt->execute();

};
$sql2="update patient_account set p_amount=p_amount-40 where p_id=?";
if($stmt2=$conn->prepare($sql2))
{
  $stmt2->bind_param("i",$_SESSION['id']);
  $stmt2->execute();
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

$sql3="insert into patient_bills(p_id,b_name,b_cost,b_date) values(?,?,?,?) ";
if($stmt3=$conn->prepare($sql3))
{
  $stmt3->bind_param("isis",$_SESSION['id'],$val,$cost,$date);
  $val="Doctor Query to Dr.".$_POST['dname'];
  $cost=40;
  $stmt3->execute();
}

header("location:http://localhost/WEB/customer-doctor-list.php");
$stmt->close();
$stmt2->close();
$stmt3->close();
$conn->close();


}
header("location:http://localhost/WEB/customer-doctor-list.php");

?>
