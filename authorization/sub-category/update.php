<?php
  include("../confs/auth.php");
  include("../confs/config.php");  

  $id = mysqli_real_escape_string($conn,$_POST['id']);
  $start = mysqli_real_escape_string($conn,$_POST['start']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $main_category = mysqli_real_escape_string($conn,$_POST['main_category']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);

  $sql = "UPDATE sub_categories SET name='$name',main_category='$main_category',updated_at=now() WHERE id = $id";

  mysqli_query($conn, $sql);

  // if request is ajax
  if ($method == 'ajax') {
    header("location: list_data.php?start=$start");
    exit();
  } 

  // for normal request
  header("location: list.php?start=$start");
?>
