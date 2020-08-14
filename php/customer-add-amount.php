<?php
require_once('connect.php');
session_start();

$sql="update patient_account set p_amount=p_amount+? where p_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("ii",$_POST['amount'],$_SESSION['id']);
  $stmt->execute();

}
$sql="select p_amount from patient_account where p_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("i",$_SESSION['id']);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
 $_SESSION['amount']=$row['p_amount'];
}
header("location:http://localhost/WEB/customer-welcome.php");
 ?>
