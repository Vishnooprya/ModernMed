<?php
require_once('php/connect.php');
include('header.php');
$sql="select * from doctor_to_patient_message inner join doctor on doctor.d_id=doctor_to_patient_message.d_id where p_id=".$_SESSION['id'];
$res=$conn->query($sql);
while($row=$res->fetch_assoc()){
  echo '<div class="jumbotron" style="margin:5%">
  <h4>Dr.'.$row['d_name'].'</h4>
  Date: '.$row['date'].'<br>
  Reply:'.$row['message'].'<br>

  ';

} ?>
