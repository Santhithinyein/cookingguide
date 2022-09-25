<?php
    include('../authorization/confs/config.php');
    include('../inc/GetDBRecords.inc.php');
    
    $respective_id = mysqli_real_escape_string($conn,$_POST['respective_id']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $points = mysqli_real_escape_string($conn,$_POST['points']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $page = mysqli_real_escape_string($conn,$_POST['page']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
  
    // if point value is already set
    if($points > 0) {
        // check email and if it is taken in this receipe,redirect back
        $valid = do_not_repeat_mail($email,$category,$page,$respective_id);

        // 1 found, 0 not found
        if($valid == 1) {
            header("location: ../$category/detail.php?id=$respective_id&&page=$page&&type=$type&&email=invalid");
            exit();
        }

         // add rating
        $sql = "INSERT INTO ratings (
            email,points,category,respective_id,created_at, updated_at
        ) VALUES (
            '$email','$points',
            '$category','$respective_id', now(), now()
        )";
    }

    mysqli_query($conn,$sql);

    // if comment is included
    if($comment !== '') {
        $sql = "INSERT INTO comments (
            name,email,comment,category,respective_id,created_at, updated_at
        ) VALUES (
            '$name','$email','$comment',
            '$category','$respective_id', now(), now()
        )";
    
        mysqli_query($conn,$sql);
    }

    // redirect back
    header("location: ../$category/detail.php?id=$respective_id&&page=$page&&type=$type");
?>  