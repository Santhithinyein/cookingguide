<?php
    include('../authorization/confs/config.php');
    include('../inc/GetDBRecords.inc.php');
    include('../inc/header.inc.php');
    include('../inc/menu.inc.php');

    $sub_cat_id = $_GET['sub_cat_id'];
    $get_sub_category_info = get_sub_category_info($sub_cat_id);
    $row_get_sub_category_info = mysqli_fetch_assoc($get_sub_category_info);

    $search_results = get_sub_categories_receipes("vegetables",$sub_cat_id);
?>
<div class="with_background">
    <div class="with_background_child_element">
        <br><br class="remove_at_mobile">
        <p class="title">Vegetables</p>
        <br>
        <div class="container">
            <p>All results for "<?php echo $row_get_sub_category_info['name']; ?>"</p>
            <br>
            <div class="receipes_content">
                <?php while($row = mysqli_fetch_assoc($search_results)): ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12">
                            <a href='detail.php?sub_cat=<?php echo $row['sub_category'] ?>&&id=<?php echo $row['id']; ?>' class="show_image_anchor">
                                <image src="../images/<?php echo $row['photo'] ?>" class="show_image">
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-5 col-sm-12 col-12">
                            <p class="receipe_name"> <?php echo $row['name_eng']; ?>
                            <p class="intro">
                                <?php
                                    $about_eng = words_limit($row['about_eng']);
                                    echo $about_eng;
                                ?>
                            <p>
                            <p style="margin-top: 10px;">
                                <?php
                                    $calculated_points = calculate_ratings($row['id'],"vegetables");
                                    
                                    include('../inc/showStars.inc.php');
                                ?>
                            </p>
                        </div>
                    </div>
                    <br><br>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- get four records per each category -->
        <div class="cooking_guide_list_parent">
            <div class="container cooking_guide_list">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12"style="padding: 30px;" >
                        <p class="type active">Vegetables</p>
                        <br><br>
                        <?php
                            $four_records = get_4_records("vegetables"); // get latest four records 
                            while($first_four_records = mysqli_fetch_assoc($four_records)): 
                        ?>
                            <a id="cookguide_title_parent" href='../vegetables/sub-categories.php?sub_cat_id=<?php echo $first_four_records['id'] ?>&&page=<?php echo $page; ?>'>
                                <p class="cookguide_title word_break"><?php echo $first_four_records['name'] ?></p>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 30px;">
                        <p class="type active">Seafood</p>
                        <br><br>
                        <?php
                            $four_records = get_4_records("seafood"); // get latest four records
                            while($first_four_records = mysqli_fetch_assoc($four_records)): 
                        ?>
                            <a id="cookguide_title_parent" href='../seafood/sub-categories.php?sub_cat_id=<?php echo $first_four_records['id'] ?>&&page=<?php echo $page; ?>'>
                                <p class="cookguide_title word_break"><?php echo $first_four_records['name'] ?></p>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 30px;">
                        <p class="type active">Meat</p>
                        <br><br>
                        <?php
                            $four_records = get_4_records("meat"); // get latest four records
                            while($first_four_records = mysqli_fetch_assoc($four_records)): 
                        ?>
                            <a id="cookguide_title_parent" href='../meat/sub-categories.php?sub_cat_id=<?php echo $first_four_records['id'] ?>&&page=<?php echo $page; ?>'>
                                <p class="cookguide_title word_break"><?php echo $first_four_records['name'] ?></p>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 30px;">
                        <p class="type active">Soup</p>
                        <br><br>
                        <?php
                            $four_records = get_4_records("soup"); // get latest four records
                            while($first_four_records = mysqli_fetch_assoc($four_records)): 
                        ?>
                            <a id="cookguide_title_parent" href='../soup/sub-categories.php?sub_cat_id=<?php echo $first_four_records['id'] ?>&&page=<?php echo $page; ?>'>
                                <p class="cookguide_title word_break"><?php echo $first_four_records['name'] ?></p>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('../inc/footer.inc.php');
?>
