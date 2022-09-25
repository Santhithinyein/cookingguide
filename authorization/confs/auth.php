<?php
  $username = "admin";
  $password = "admin";

  session_start();
  if(!isset($_SESSION['auth'])) {
    header("location: ../login/index.php");
    exit();
  }
?>