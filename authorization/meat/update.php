<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = mysqli_real_escape_string($conn,$_POST['id']);
  $name_eng = mysqli_real_escape_string($conn,$_POST['name_eng']);
  $name_mm = mysqli_real_escape_string($conn,$_POST['name_mm']);
  $ingredients_eng = mysqli_real_escape_string($conn,$_POST['ingredients_eng']);
  $ingredients_mm = mysqli_real_escape_string($conn,$_POST['ingredients_mm']);
  $about_eng = mysqli_real_escape_string($conn,$_POST['about_eng']);
  $about_mm = mysqli_real_escape_string($conn,$_POST['about_mm']);
  $start = mysqli_real_escape_string($conn,$_POST['start']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);
  $sub_category = mysqli_real_escape_string($conn,$_POST['sub_category']);
  $type = mysqli_real_escape_string($conn,$_POST['type']);
  $photo = $_FILES['photo']['name'];
  $tmp = $_FILES['photo']['tmp_name'];

  if($photo) {
    move_uploaded_file($tmp, "../../images/$photo");
    $sql = "UPDATE meat SET name_eng='$name_eng',name_mm='$name_mm',ingredients_eng='$ingredients_eng',ingredients_mm='$ingredients_mm',about_eng='$about_eng', 
        about_mm ='$about_mm',sub_category = '$sub_category',type = '$type',
        photo='$photo', updated_at=now() WHERE id = $id";
  } else {
    $sql = "UPDATE meat SET name_eng='$name_eng',name_mm='$name_mm',ingredients_eng='$ingredients_eng',ingredients_mm='$ingredients_mm',about_eng='$about_eng', 
        about_mm ='$about_mm',sub_category = '$sub_category',type = '$type', updated_at=now() WHERE id = $id";
  }

  mysqli_query($conn, $sql);

  // if request is ajax
  if ($method == 'ajax') {
    header("location: list_data.php?start=$start");
    exit();
  } 

  // for normal request
  header("location: list.php?start=$start");
?>
