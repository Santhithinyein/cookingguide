<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = mysqli_real_escape_string($conn,$_POST['id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);

  // get salt
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $salt = $row['salt'];
 
  if($password == '') {
    $sql = "UPDATE admin SET name='$name',email='$email', 
        updated_at=now() WHERE id = $id";
  } else {
    $password = sha1( $salt . $password );
    $sql = "UPDATE admin SET name='$name',email='$email',password='$password', 
        updated_at=now() WHERE id = $id";
  }

  mysqli_query($conn, $sql);

  // if request is ajax
  if ($method == 'ajax') {
    header("location: info_data.php");
    exit();
  } 

  // for normal request
  header("location: info.php");
?>
