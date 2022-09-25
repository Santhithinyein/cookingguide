<?php
  include("../confs/auth.php");
  include("../confs/config.php");  

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $main_category = mysqli_real_escape_string($conn,$_POST['main_category']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);

  $sql = "INSERT INTO sub_categories (
    name, main_category, created_at, updated_at
  ) VALUES (
    '$name','$main_category', now(), now()
  )";

  mysqli_query($conn, $sql);

  if ($method == 'ajax') {
    header("location: list_data.php");
    exit();
  }

  header("location: list.php");
?>
