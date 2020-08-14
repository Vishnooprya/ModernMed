<?php
session_start();
require_once('connect.php');
$sql="delete from appointments where d_id=? and date_and_time=? and p_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("isi",$_POST['did'],$_POST['date'],$_SESSION['id']);
  $stmt->execute();
}
$val=$_POST['cost']- $_POST['cost']* (5/100);
echo $val;
$sql2="update patient_account set p_amount=p_amount+? where p_id=?";
if($stmt2=$conn->prepare($sql2))
{
  echo "ok";
  $stmt2->bind_param("ii",$val,$_SESSION['id']);
  if($stmt2->execute())
  {
    echo "ok";
  }
  else {
    echo $stmt2->error;
  }
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
?>
