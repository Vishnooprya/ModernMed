<?php
session_start();
require_once('connect.php');
$sql2="select sum(upvote) from rating where d_id=?";
$stmt2=$conn->prepare($sql2);
if($stmt2)
{
  $stmt2->bind_param("i",$_POST['did']);
  $stmt2->execute();
  $res=$stmt2->get_result();
  $row2=$res->fetch_assoc();
  echo $row2['sum(upvote)'];

}
?>
