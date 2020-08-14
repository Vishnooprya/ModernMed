
<?php
require_once('connect.php');
session_start();

$sql="select d_id,d_name,d_gender,d_special,d_qual,d_email,d_phone,d_image,d_cost,h_name from doctor inner join hospital where doctor.h_id=hospital.h_id and d_special=?";
if($stmt=$conn->prepare($sql))
{
  $stmt->bind_param("s",$_GET['q']);
  $stmt->execute();
  $result=$stmt->get_result();
  while($row=$result->fetch_assoc())
  {
    if($row['d_image']=='empty' && $row['d_gender']=='Male')
    {
      $row['d_image']='male.png';
    }
    if($row['d_image']=='empty' && $row['d_gender']=='Female')
    {
      $row['d_image']='female.png';
    }

    $sql2="select sum(upvote),sum(downvote) from rating where d_id=?";
    $stmt2=$conn->prepare($sql2);
    if($stmt2)
    {
      $stmt2->bind_param("i",$row['d_id']);
      $stmt2->execute();
      $res=$stmt2->get_result();
      $row2=$res->fetch_assoc();

    }

    echo '
    <div class="column">
      <div class="card">
      <div class="card-horizontal">
        <div class="img-square-wrapper">
         <img src="images/'.$row['d_image'].'" class="img-rounded card-img-left" width="200px" height="150px" alt="">

        </div>
            <br>
            <br>
            <div class="card-body" style="margin-left:30px;">
            <table>
            <tbody>
            <tr><td><b><u>Dr.'.$row['d_name'].'</u></b></td></tr>
              <tr><td><b>Specialization:</b></td><td>'.$row['d_special'].'</td>
              </tr>
              <tr><td><b>Qualification:</b></td><td>'.$row['d_qual'].'</td>
              </tr>
              <tr><td><b>Hospital Name:</b></td><td>'.$row['h_name'].'</td></tr>
              <tr><td><b>E-mail:</td><td></b>'.$row['d_email'].'</td></tr>
              <tr><td><b>Phone Number:</b></td><td>'.$row['d_phone'].'</td></tr>
              </tbody>
              </table>






            </div>
            <form action="http://localhost/WEB/message-doctor.php" method="post" style="margin-left:25%;margin-top:5%">
            <input type="hidden" name="did" value="'.$row['d_id'].'"></input>
            <input type="hidden" name="dname" value="'.$row['d_name'].'"></input>


            <button type="submit" class="btn btn-primary" style="width:150px;height:40px;">Message Now</button>
            </form>
            <form action="http://localhost/WEB/appointment-doctor.php" method="post" style="margin-left:3%;margin-top:5%">
            <input type="hidden" name="did" value="'.$row['d_id'].'"></input>
            <input type="hidden" name="dname" value="'.$row['d_name'].'"></input>
            <input type="hidden" name="dcost" value="'.$row['d_cost'].'"></input>

            <button type="submit" class="btn btn-primary" style="width:150px;height:40px;">Fix Appointment</button>
            </form>
            <form action="http://localhost/WEB/php/like.php" method="post" style="margin-top:2.5%;argin-left:20px">
              <input type="hidden" name="did" id="did" value="'.$row['d_id'].'"></input>
              <input type="hidden" name="pid" id="pid" value="'.$_SESSION['id'].'"</input>
              <button onclick="like()" type="button" class="btn btn-default" style="width:120px;margin:5px;margin-left:20px">Like (<span id="like'.$row['d_id'].'">'.$row2['sum(upvote)'].'</span>)</button><br>
              <button onclick="dislike()" type="button" class="btn btn-warning" style="width:120px;margin:5px;margin-left:20px">Dislike (<span id="dislike'.$row['d_id'].'">'.$row2['sum(downvote)'].'</span>)</button>
              </form>
          </div>
        </div>';

  }
}


 ?>
