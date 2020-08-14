<?php
require_once('connect.php');
session_start();
$id=$_SESSION['id'];

$sql="select p_amount from patient_account where p_id=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param('i',$id);
  $stmt->execute();
  $result=$stmt->get_result();
  if($result->num_rows==1)
  {
    $row=$result->fetch_assoc();
    echo $row['p_amount'];
  }
}


 ?>
