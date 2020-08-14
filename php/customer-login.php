<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: http://localhost/WEB/customer-welcome.php");
    exit;
}

// Include config file
require_once "connect.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT p_id,p_name,p_pw,p_image,p_gender FROM patient WHERE p_id = ?";

        if($stmt=$conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($id, $name,$hashed_password,$image,$gender);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"]=$name;
                            $_SESSION["username"] = $username;
                            $_SESSION['image']=$image;
                            if($image==="empty" && $gender=="Male")
                            {
                              $_SESSION['image']='male.png';
                            }
                            if($image==="empty" && $gender=="Female")
                            {
                              $_SESSION['image']='female.png';
                            }

                            $stmt="select p_amount from patient_account where p_id=".$_SESSION['id'];
                          if( $result = $conn->query($stmt))
                          {
                          //  echo "okgoood";
                          }
                            if ($result->num_rows==1) {
                          //  echo "ok";
                            while($row = $result->fetch_assoc()) {

                            $_SESSION['amount']=$row['p_amount'];
                            //echo $_SESSION['amount'];
                          }
                          header("location:http://localhost/WEB/customer-welcome.php");

                        }

                            // Redirect user to welcome page

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

header("location:customer-login.html");

    // Close connection
    $conn->close();
}
?>
