<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: http://localhost/WEB/doctor-welcome.php");
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
        $sql = "SELECT d_id,d_name,d_pw,d_image,d_gender FROM doctor WHERE d_id = ?";

        if($stmt=$conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            //echo "ok";
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                  //echo "ok2";
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

                            // Redirect user to welcome page

                        } else{
                            // Display an error message if password is not valid
                            echo "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    echo "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }


//  echo $name;
header("location:http://localhost/WEB/doctor-welcome.php");

    // Close connection
    $conn->close();
}
?>
