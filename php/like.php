<?php
require_once('connect.php');
$sql="insert into rating(d_id,p_id,upvote,downvote)values(?,?,?,?)";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("iiii",$_POST['did'],$_POST['pid'],$_POST['upvote'],$_POST['downvote']);
  $stmt->execute();
}
?>
