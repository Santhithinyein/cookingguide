<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = $_GET['id'];
  $start = $_GET['start'];
  $method = $_GET['method'];

  // delete respective comments
  $delete_comments = "DELETE FROM comments WHERE respective_id = $id";
  mysqli_query($conn,$delete_comments);

  // delete respective ratings
  $delete_ratings = "DELETE FROM ratings WHERE respective_id = $id";
  mysqli_query($conn,$delete_ratings);

  $sql = "DELETE FROM seafood WHERE id = $id";
  mysqli_query($conn, $sql);

  if ($method == 'ajax') {
    header("location: list_data.php?start=$start");
    exit();
  } 
  header("location: list.php?start=$start");
?>
