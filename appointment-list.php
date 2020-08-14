<?php
require_once('php/connect.php');
include('header.php');

?>
<form action="http://localhost/WEB/php/cancel-app.php" method="post">
  <?php
  $sql="select doctor.d_id,d_name,date_and_time,cost from appointments inner join doctor on appointments.d_id=doctor.d_id where p_id=?";
  if($stmt=$conn->prepare($sql))
  {
    $stmt->bind_param("i",$_SESSION['id']);
    $stmt->execute();
    $res=$stmt->get_result();
    while($row=$res->fetch_assoc())
    {
      echo '<div class="jumbotron" style="margin:2% 5% 2% 5%"> <b>Dr.<span name="dname">
      <input type="hidden" name="did" value="'.$row['d_id'].'">
      <input type="hidden" name="date" value="'.$row['date_and_time'].'">'.
      '<input type="hidden" name="cost" value="'.$row['cost'].'">'.

      $row['d_name'].'</span></b> <br> Date and Time: '.$row['date_and_time'].'
      <button type="submit" style="float:right" class="btn btn-primary"> Cancel Appointment </button></div>
      ';
    }
  }
  ?>
</form>
