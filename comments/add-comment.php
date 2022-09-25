<?php
    include('../authorization/confs/config.php');
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $page = mysqli_real_escape_string($conn,$_POST['page']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $method = mysqli_real_escape_string($conn,$_POST['method']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $respective_id = mysqli_real_escape_string($conn,$_POST['respective_id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);

    $sql = "INSERT INTO comments (
        name,email,comment,category,respective_id,created_at, updated_at
    ) VALUES (
        '$name','$email','$comment',
        '$category','$respective_id', now(), now()
    )";

    mysqli_query($conn,$sql);

    // redirect back
    header("location: ../$category/detail.php?id=$id&&page=$page&&type=$type");
?>