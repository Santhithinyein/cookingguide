<?php
  include("../confs/auth.php");
  include("../confs/config.php");  

  $name_mm = mysqli_real_escape_string($conn,$_POST['name_mm']);
  $ingredients_mm = mysqli_real_escape_string($conn,$_POST['ingredients_mm']);
  $about_mm = mysqli_real_escape_string($conn,$_POST['about_mm']);
  $name_eng = mysqli_real_escape_string($conn,$_POST['name_eng']);
  $ingredients_eng = mysqli_real_escape_string($conn,$_POST['ingredients_eng']);
  $about_eng = mysqli_real_escape_string($conn,$_POST['about_eng']);
  $sub_category = mysqli_real_escape_string($conn,$_POST['sub_category']);
  $type = mysqli_real_escape_string($conn,$_POST['type']);
  $photo = mysqli_real_escape_string($conn,$_FILES['photo']['name']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);
  $tmp = $_FILES['photo']['tmp_name'];

  if($photo) {
    move_uploaded_file($tmp, "../../images/$photo");
  }

  $sql = "INSERT INTO vegetables (
    name_eng,name_mm, ingredients_eng,ingredients_mm, about_eng,about_mm,sub_category,type,photo, created_at, updated_at
  ) VALUES (
    '$name_eng','$name_mm','$ingredients_eng','$ingredients_mm','$about_eng','$about_mm','$sub_category','$type',
    '$photo', now(), now()
  )";

  mysqli_query($conn, $sql);

  if ($method == 'ajax') {
    header("location: list_data.php");
    exit();
  }

  header("location: list.php");
?>
