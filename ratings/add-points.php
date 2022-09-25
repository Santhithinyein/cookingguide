<?php
    include('../authorization/confs/config.php');
    include('../inc/GetDBRecords.inc.php');
    $page = mysqli_real_escape_string($conn,$_POST['page']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $respective_id = mysqli_real_escape_string($conn,$_POST['respective_id']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $points = mysqli_real_escape_string($conn,$_POST['points']);
    // $method = mysqli_real_escape_string($conn,$_POST['method']);

    // check email and if it is taken in this receipe,redirect back
    $valid = do_not_repeat_mail($email,$category,$page,$respective_id);

    // 1 found, 0 not found
    if($valid == 1) {
        header("location: ../ratings/rating.php?cat=$category&&id=$respective_id&&page=$page&&type=$type&&email=invalid");
        exit();
    }

    $sql = "INSERT INTO ratings (
        email,points,category,respective_id,created_at, updated_at
    ) VALUES (
        '$email','$points',
        '$category','$respective_id', now(), now()
    )";

    mysqli_query($conn,$sql);

    // redirect back
    header("location: ../$category/detail.php?id=$respective_id&&page=$page&&type=$type");
?>