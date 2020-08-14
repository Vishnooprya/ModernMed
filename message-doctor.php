<?php
require_once('php/connect.php');
//session_start();
include('header.php');

?>
<div class="jumbotron" style="width:80%;margin:5% 10% 5% 10%">
  <h3 align="center">Ask Your Query to <b>Dr.<?php echo $_POST['dname']?></b></h3>
  <h6 align="center">(Each message costs Rs.40)</h6>
  <form class="" action="http://localhost/WEB/php/message-doctor.php" method="post">
    <input type="hidden" name="did" value="<?php echo $_POST['did'];?>">
    <input type="hidden" name="pid" value="<?php echo $_SESSION['id'];?>">
    <input type="hidden" name="date" value="<?php echo date("d/m/Y");?>">
    <input type="hidden" name="dname" value="<?php echo $_POST['dname'];?>">
    <div class="form-group">
       <label>Symptoms</label>
       <input type="text" class="form-control" id="symptoms" name="symptoms" placeholder="Symptoms" required>
    </div>
    <div class="form-group">
       <label>Number of Days</label>
       <input type="text" class="form-control" id="noofdays" name="noofdays" placeholder="How long have you been experiencing these symptoms?" required>
    </div>
    <div class="form-group">
       <label>Please type in any other clarifications you might need</label>
       <input type="text" class="form-control" id="clari" name="clari" placeholder="Clarifications">
    </div>
    <button type="submit" class="btn btn-primary" name="button" style="margin-left:35%">Ask Now</button>

  </form>

</div>
