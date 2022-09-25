<?php
  session_start();
  include("../confs/config.php");

  $secret_key = mysqli_real_escape_string($conn,$_POST['secret_key']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);


  echo $secret_key;
  echo $password;

  // get salt
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = 1");
  $row = mysqli_fetch_assoc($result);
  $salt = $row['salt'];
 
  if($row['secret_key'] == $secret_key) {
    $password = sha1( $salt . $password );
    $sql = "UPDATE admin SET password='$password', 
        updated_at=now() WHERE id = 1";

    mysqli_query($conn, $sql);

    $_SESSION['auth'] = true;
    header("location: ../vegetables/list.php?login=success"); 
  } else {
    header("location: reset-password.php?key=invalid");
  }
?>
 