<?php
  session_start();
  include('../confs/config.php');

  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);

  // get salt
  $id = 1;
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $salt = $row['salt'];
  $salted_password = sha1( $salt . $password);
  $server_email = $row['email'];
  $server_password = $row['password'];
  
  echo $salted_password;
  echo "<br>";
  echo $server_password;
  
  if($email == $server_email and $salted_password == $server_password) {
    $_SESSION['auth'] = true;
    if ($method == 'ajax') {
      header("location: ../vegetables/list_data.php?login=success");
    } else {
      header("location: ../vegetables/list.php?login=success");
    }
  } else {
    if ($method == 'ajax') {
      header("location: index_data.php?login=failed");
    }
    else {
      header("location: index.php?login=failed");
    }
  }
?>
