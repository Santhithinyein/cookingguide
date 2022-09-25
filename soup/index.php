<?php 
    include('../inc/header.inc.php'); 
    include('../authorization/confs/config.php'); 
    include('../inc/GetDBRecords.inc.php'); 
    
    $page = 1;
    $type = 'all'; // default value

    include('../inc/menu.inc.php');

    // pre active value for each type
    $type_active_all = 'null';
    $type_active_mm = 'null';
    $type_active_cn = 'null';
    $type_active_in = 'null';

    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    }

    $total = mysqli_query($conn, "SELECT id FROM soup");
    $total = mysqli_num_rows($total);

    # Paging
    $limit = 5;

    $start = ($page-1) * $limit;

    // get type
    if(isset($_GET['type'])) {
        $type = $_GET['type'];
        if($type !== 'myanmar' && $type !== 'chinese' && $type !== 'indian')
        {
            $type = 'all'; // reset type value
            // get all records
            $all_records = get_all_records("soup",$limit,$start);
        } else {
            $all_records = get_all_records_by_type("soup",$type,$limit,$start);
        }
    } else {
        // get all records
        $all_records = get_all_records("soup",$limit,$start);
    }

    // modify active value for each type
    if($type == 'all') {
        $type_active_all = 'active';
    }

    if($type == 'myanmar') {
        $type_active_mm = 'active';
    }

    if($type == 'chinese') {
        $type_active_cn = 'active';
    }

    if($type == 'indian') {
        $type_active_in = 'active';
    }
?>
    <div class="with_background">
        <div class="with_background_child_element">
            <br><br class="remove_at_mobile">
            <p class="title">Soup</p>
            <div class="type_parent">
                <p class="type <?php echo $type_active_all; ?>">
                    <a href='index.php?page=1&&type=all' id="change_white">
                        All
                    </a>
                </p>
                <p class="type <?php echo $type_active_mm; ?>">
                    <a href='index.php?page=1&&type=myanmar' id="change_white">
                        Myanmar
                    </a>
                </p>
                <p class="type <?php echo $type_active_cn; ?>">
                    <a href='index.php?page=1&&type=chinese' id="change_white">
                        Chinese
                    </a>
                </p>
                <p class="type <?php echo $type_active_in; ?>">
                    <a href='index.php?page=1&&type=indian' id="change_white">
                        Indian
                    </a>
                </p>
            </div>
            <br>

            <?php                 
                // get latest record
                $latest_record = mysqli_fetch_assoc(get_latest_record("soup"));
                $about = $latest_record['about_eng'];
                $latest_record_about = words_limit($about); // count words
            ?>
            <br><br>
            <div class="container">
                <div class="receipes_content">
                    <?php while($row = mysqli_fetch_assoc($all_records)): ?>
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12">
                                <a href='detail.php?id=<?php echo $row['id'] ?>&&page=<?php echo $page; ?>&&type=<?php echo $type; ?>' class="show_image_anchor">
                                    <image src="../images/<?php echo $row['photo'] ?>" class="show_image">
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-7 col-md-5 col-sm-12 col-12">
                                <p class="receipe_name"> <?php echo $row['name_eng']; ?>
                                <p class="intro">
                                    <?php
                                        $about_eng = words_limit($row['about_eng']);
                                        echo $about_eng;
                                        echo "<br>";
                                        $calculated_points = calculate_ratings($row['id'],"soup");
                                
                                        include('../inc/showStars.inc.php');
                                    ?>
                                <p>
                            </div>
                        </div>
                        <br><br>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
                // count total records
                if($type == 'all') {
                    $rs_result = total_count("soup");  
                } else {
                    $rs_result = total_count_by_type("soup",$type);
                }
                   
                $row = mysqli_fetch_row($rs_result);     
                $total_records = $row[0]; 

                // Number of pages required.
                $total_pages = ceil($total_records / $limit);     
                $pagLink = "";
            ?>
            <center>
                <!-- Pagination for larger screens -->
                <div class="larger">
                    <div class="pagination">    
                        <?php  
                            if($page>=2){   
                                echo "<a href='index.php?page=".($page-1)."&&type=".$type."'>  Prev </a>";   
                            }       
                                    
                            for ($i=1; $i<=$total_pages; $i++) {   
                            if ($i == $page) {   
                                $pagLink .= "<a class = 'active' href='index.php?page="  
                                                                    .$i."&&type=".$type."'>".$i." </a>";   
                            }               
                            else  {   
                                $pagLink .= "<a href='index.php?page=".$i."&&type=".$type."'>   
                                                                    ".$i." </a>";     
                            }   
                            };     
                            echo $pagLink;   
                    
                            if($page<$total_pages) {   
                                echo "<a href='index.php?page=".($page+1)."&&type=".$type."'>  Next </a>";   
                            }   
                        ?>
                    </div>
                </div>
                <!-- Pagination for mobile screens -->
                <div class="mobile">
                    <div class="pagination">
                        <?php
                            if($page>=2){   
                                echo "<a href='index.php?page=".($page-1)."&&type=".$type."'>  Prev </a>";   
                            }
                            if($page<$total_pages) {   
                                echo "<a href='index.php?page=".($page+1)."&&type=".$type."'>  Next </a>";   
                            }
                        ?>          
                    </div>
                </div>
            </center>
            <br>
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
<?php include('../inc/footer.inc.php'); ?>