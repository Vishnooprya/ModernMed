<?php
session_start();
require_once "connect.php";
$val=$_POST['val'];
$param=$_POST['param'];
echo $val,$param,$_SESSION['id'];

if($param=="Building Number and Street")
{
  $sql="update patient set p_build=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("ss",$val,$_SESSION['id']);

    if($stmt->execute())
    {
    //  echo "updated";
    }
    else {
      echo $conn->error;
    }
  }
}
if($param=="District")
{
  $sql="update patient set p_area=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("si",$val,$_SESSION['id']);
    $stmt->execute();
  }
}
if($param==="State")
{
  $sql="update patient set p_state=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("si",$val,$_SESSION['id']);
    $stmt->execute();
  }
}
if($param==="Pincode")
{
  $sql="update patient set p_pincode=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("si",$val,$_SESSION['id']);
    $stmt->execute();
  }
}
if($param==="Email")
{
  $sql="update patient set p_email=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("si",$val,$_SESSION['id']);
    $stmt->execute();
  }
}
if($param==="Phone Number")
{
  $sql="update patient set p_phone=? where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    $stmt->bind_param("si",$val,$_SESSION['id']);
    $stmt->execute();
  }
}
if($param==="password")
{
  echo "ok";
  //$pw=$_POST['current_pw'];
  $pw=$_POST['new_pw1'];
  $pw2=$_POST['new_pw2'];
  $sql="select p_pw from  patient where p_id=?";
  $stmt=$conn->prepare($sql);
  if($stmt)
  {
    //echo "ok1";
    $stmt->bind_param("i",$_SESSION['id']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows==1)
    {
    //  echo "ok2";
      $stmt->bind_result($hpw);
      if($stmt->fetch())
      {
        //echo $pw,$pw2,$val,$hpw;
        if(password_verify($val,$hpw) && $pw===$pw2 )
        {
        //  echo "ok4";
          $sql="update patient set p_pw=? where p_id=?";
          $pass=password_hash($pw,PASSWORD_DEFAULT);

          if($stmt=$conn->prepare($sql))
          {
            //echo "ok5";

            $stmt->bind_param("si",$pass,$_SESSION['id']);
            $stmt->execute();
          }
        }
      }
    }

  }
}
if($param==="photo")
{
//  echo "ok";
  define ('SITE_ROOT','C:\xampp\htdocs\WEB');

  if ($_FILES['photo']['name']!="") {
    //echo "ok1";
    	$img = $_FILES['photo']['name'];
    	$target = "\images/".$img;
      $sql="update patient set p_image=? where p_id=?";
      $stmt=$conn->prepare($sql);
      if($stmt)
      {
      //  echo "ok2";
        $stmt->bind_param("si",$img,$_SESSION['id']);
        if($stmt->execute())
        {
        //  echo "done";
        }
        else {
        //  echo $stmt->error;
        }
      }
      else {
        //echo $conn->error.'error';
      }
    	if (move_uploaded_file($_FILES['photo']['tmp_name'], SITE_ROOT.$target)) {
    	//	echo "Image uploaded successfully";
      $_SESSION['image']=$img;
    //  echo "ok3";
    }

}
}
header("location:http://localhost/WEB/customer-profile.php");
 ?>
