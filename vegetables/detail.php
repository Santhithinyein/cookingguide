<?php 
    include('../inc/header.inc.php');
    include('../authorization/confs/config.php');
    include('../inc/GetDBRecords.inc.php');

    // if id and page not include, redirect back 
    /*
    if(!isset($_GET['id']) && !isset($_GET['page']))
    {
        header("location: index.php");
    }
    */

    if(isset($_GET['sub_cat'])) {
        $id  = $_GET['id'];
        $sub_cat_id = $_GET['sub_cat'];
        $page = 0;
        $type = 'null';
    } else {
        $id = $_GET['id'];
        $page = $_GET['page'];
        $type = $_GET['type'];
    }

    $total_points = get_total_points("vegetables",$id); // get total points for rating
    $record = get_detail_record("vegetables",$id); // get detail record
    $row = mysqli_fetch_assoc($record);
?>
<div class="with_background">
    <div class="adjust_with_background"></div>
    <div class="with_background_child_element">
        <div class="home_menu">
            <div class="menu">
                <div class="float-right menu_detail">
                    <div class="category_anchor">
                        <div class="myDIV"> 
                            <a id="change_white" href="../home" class="category">Home</a>
                        </div>
                    </div>
                    <div class="category_anchor" style="margin-left: 18px;">
                        <div class="myDIV">
                            <a id="change_white" href="../authorization" class="category">Admin</a>
                        </div>
                    </div>
                    <div class="category_anchor" style="margin-left: 18px;">
                        <div class="myDIV">
                            <a id="change_white" href="../vegetables" class="category">User</a>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="../inc/category.inc.php">
                        <button class="menu_button"></button>
                    </a>
                </div>
            </div>
        </div>
        <div class="main_body_parent">
            <br><br>
            <div class="container">
                <div class="row">
                    <div style="padding:0" class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <image src="../images/<?php echo $row['photo']; ?>" style="width: 100%;">
                        <p style="margin-top: 10px;">
                            <?php
                                $calculated_points = calculate_ratings($id,"vegetables");
                                
                                include('../inc/showStars.inc.php');
                            ?>
                        </p>
                        <?php if(isset($_GET['email']) && $_GET['email'] == 'invalid') : ?>
                            <div class="alert alert-dark" role="alert">
                                This is email is already taken to give points.
                            </div> 
                        <?php endif; ?>
                        <form action="../ratingsANDcomments/add-points-comments.php" method="post">
                            <input type="hidden" name="category" value="vegetables">
                            <input type="hidden" name="respective_id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="page" value="<?php echo $page; ?>">
                            <input type="hidden" name="type" value="<?php echo $type; ?>">

                            <input type="text" name="name" placeholder="Name" class="comment_name" required>
                            <br><br>
                            <input type="email" name="email" placeholder="Email" class="comment_email" required>
                            <br><br>
                            <label>Points :</label>
                            <br>
                            <select class="show_points" name="points">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <br><br>
                            <textarea placeholder="comment" name="comment" class="comment_box"></textarea>
                            <br><br>
                            <input type="submit" value="Commit" class="comment_submit">
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p class="detail_info">Name</p>
                        <p><?php echo $row['name_eng']; ?><p>
                        <p class="detail_info">Ingredients</p>
                        <p class="word_break"><?php echo $row['ingredients_eng']; ?></p>
                        <p class="detail_info">Direction</p>
                        <p><?php echo $row['about_eng']; ?></p>
                        <p class="detail_info_mm">အမည်</p>
                        <p><?php echo $row['name_mm']; ?><p>
                        <p class="detail_info_mm">ပါဝင်ပစ္စည်းများ</p>
                        <p class="word_break"><?php echo $row['ingredients_mm']; ?></p>
                        <p class="detail_info_mm">ပြုလုပ်နည်း</p>
                        <p><?php echo $row['about_mm']; ?></p>
                    </div>
                </div>
                <p class="comment_border"></p>
                <p class="detail_info">Comments</p>
                <br>
                <div class="show_comments">
                    <?php 
                        $comments = get_comments("vegetables",$id);
                        while($row=mysqli_fetch_assoc($comments)) :
                    ?>
                    <p class="name_and_email"><b><?php echo $row['name']; ?></b>(<small class="word_break"><?php echo $row['email']; ?></small>)</p>
                    <p class="word_break"><?php echo $row['comment']; ?></p>
                    <?php endwhile; ?>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<?php include('../inc/footer.inc.php'); ?>