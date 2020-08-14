<?php
//session_start();
inclue('header2.php');
require_once('php/connect.php');
$sql="select patient.p_id,p_dob,p_gender,symptoms,datetime,no_of_days,extras,replied_status from patient_to_doctor_message inner join patient on patient.p_id=patient_to_doctor_message.p_id where d_id=? and replied_status='Not Replied'";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("i",$_SESSION['id']);
  $stmt->execute();
  $res=$stmt->get_result();

  while($row=$res->fetch_assoc())
  {
    echo '
    <form action="http://localhost/WEB/php/reply.php" method="post"><div class="jumbotron" style="margin:5%">
    <h4>'.$row['p_id'].'</h4>
    Date: '.$row['datetime'].'<br>
    DOB:'.$row['p_dob'].'<br>
    Gender:'.$row['p_gender'].'<br>
    Symptoms: '.$row['symptoms'].'<br>
    Days:'.$row['no_of_days'].'<br>
    Other Details: '.$row['extras'].'</br>
    <div class="form-group">
       <label>Reply Now:</label><br>
       <textarea rows="4" cols="50" name="reply"></textarea>

    </div>
    <input type="hidden" name="pid" value="'.$row['p_id'].'"></input>
    <input type="hidden" name="symp" value="'.$row['symptoms'].'"></input>

    <button type="submit" class="btn btn-primary">Send Reply</button>


    </div>
    </form>
    ';


  }
}
else {
  echo $conn->error;
}
?>
