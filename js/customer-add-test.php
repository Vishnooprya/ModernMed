<?php
session_start();
require_once "../php/connect.php";
$sql="insert into patient_bills(p_id,b_name,b_cost,b_date,b_result) values(?,?,?,?,?)";
//alert("fiun");
$stmt=$conn->prepare($sql);

if($stmt)
{
  $stmt->bind_param("issss",$pid,$bname,$bcost,$bdate,$bresult);
  $pid=$_SESSION['id'];
  $bname=$_GET['t_name'];
  $bcost=$_GET['t_cost'];
  $bdate=date('Y-m-d');
  $arr=array("a"=>'Normal',"b"=>'Abnormal');
  shuffle($arr);
  $bresult=$arr[0];
    if($_SESSION['amount']<$bcost)
  {
    $error="Error! Low Balance";
    exit();
  }

  if($stmt->execute())
  {
  //  echo "ik";
  }
  else {
    echo $stmt->error;

  }
  $sql="update patient_account set p_amount=p_amount-? where p_id=? ";
  if($stmt=$conn->prepare($sql))
  {
    $stmt->bind_param("ii",$bcost,$_SESSION['id']);
    $stmt->execute();

  }
  $sql="select p_amount from patient_account where p_id=? ";
  if($stmt=$conn->prepare($sql))
  {
    $stmt->bind_param("i",$_SESSION['id']);
    $stmt->execute();
    $result=$stmt->fetch_result();
    $row=$result->fetch_assoc();
    $_SESSION['amount']=$row['p_amount'];

  }


}
?>
