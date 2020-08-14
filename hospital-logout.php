<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["image"]);

header("Location:index.html");
?>
