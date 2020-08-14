<?php
session_start();
require_once('connect.php');
$sql="insert into doctor_to_patient_message(d_id,p_id,message,date) values(?,?,?,?)";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("iiss",$_SESSION['id'],$_POST['pid'],$_POST['reply'],$date);
  $date=date("Y-m-d");
  if($stmt->execute())
  {

  }
  else {
    echo $stmt->error;
  }
}
$sql2="update patient_to_doctor_message set replied_status='Replied' where symptoms='".$_POST['symp']."'";
if($conn->query($sql2))
{

}
else {
  echo $conn->error;
}
header("location:http://localhost/WEB/reply-message.php");
?>
