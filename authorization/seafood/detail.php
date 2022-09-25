<?php
    include('../inc/header.inc.php');
    include('../confs/auth.php');
    include('../confs/config.php');
    include('../../inc/GetDBRecords.inc.php');
    $start = $_GET['start'];
    $id = $_GET['id'];

    $query ="SELECT * FROM seafood WHERE id=$id";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);

    $name_eng = $row['name_eng'];
    $name_mm = $row['name_mm'];
    $ingredients_eng = $row['ingredients_eng'];
    $ingredients_mm = $row['ingredients_mm'];
    $about_eng = $row['about_eng'];
    $about_mm = $row['about_mm'];
    $photo = $row['photo'];
?>
<div class="detail">
    <div class="admin_menu_parent">
        <a href="../../home" class="admin_menu">Home</a>
        <a href="../../authorization" class="admin_menu">Admin</a>
        <a href="../../vegetables" class="admin_menu">User</a>
        &nbsp;&nbsp;&nbsp;
    </div>
    <div class="book_image_detail_parent">
        <img src="../../images/<?php echo $photo; ?>" class="book_image_detail">
    </div>
    <?php
        $calculated_points = calculate_ratings($row['id'],"seafood");
                                
        include('../inc/showStars.inc.php');
    ?>
    <h2><?php echo $name_eng; ?></h2>
    <i><?php echo $ingredients_eng; ?></i>
    <p><?php echo $about_eng; ?></p>
    <h2><?php echo $name_mm; ?></h2>
    <i><?php echo $ingredients_mm; ?></i>
    <p><?php echo $about_mm; ?></p>
    <p class="comment_border"></p>
    <p class="detail_info">Comments</p>
    <div class="show_comments">
        <?php 
            $comments = get_comments("seafood",$id);
            while($row=mysqli_fetch_assoc($comments)) :
        ?>
        <p class="name_and_email"><b><?php echo $row['name']; ?></b>(<small class="word_break"><?php echo $row['email']; ?></small>)</p>
        <p class="word_break"><?php echo $row['comment']; ?></p>
        <?php endwhile; ?>
    </div>
    <a href="list.php?start=<?php echo $start; ?>" class="back">Back</a>
</div>
<?php
    include('../inc/footer.inc.php');    
?>