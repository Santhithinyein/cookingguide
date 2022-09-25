<?php
    // active effect
    $vegetables = 'null';
    $seafood = 'null';
    $meat = 'null';
    $soup = 'null';

    $current_filename = $_SERVER['PHP_SELF']; // get current script

    if ($current_filename == "/cookingguide/vegetables/index.php" || $current_filename == "/vegetables/index.php") {
        $vegetables = "active";
    } else if ($current_filename == "/cookingguide/seafood/index.php" || $current_filename == "/seafood/index.php") {
        $seafood = "active";
    } else if ($current_filename == "/cookingguide/meat/index.php" || $current_filename == "/meat/index.php") {
        $meat = "active";
    } else if ($current_filename == "/cookingguide/soup/index.php" || $current_filename == "/soup/index.php") {
        $soup = "active";
    }
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }
?>

<div class="menu">
    <div class="float-right menu_detail">
        <div class="category_anchor" style="margin-right: -40px;">
            <div class="myDIV"> 
                <a id="change_white" href="../home" class="category">Home</a>
            </div>
        </div>
        <div class="category_anchor" style="margin-right: -40px;">
            <div class="myDIV"> 
                <a id="change_white" href="../authorization" class="category">Admin</a>
            </div>
        </div>
        <div class="category_anchor" style="margin-right: -50px;">
            <div class="myDIV"> 
                <a id="change_white" href="../vegetables" class="category">User</a>
            </div>
        </div>
        <div class="category_anchor">
            <div class="myDIV"> 
                <a id="change_white" href="../vegetables" class="category <?php echo $vegetables; ?>">Vegetables</a>
            </div>
            <div class="hide"> 
                <ul class="sub_cat">
                    <li><a id="change_white" href='../vegetables/index.php?page=1&&type=myanmar'>Myanmar</a></li>
                    <li><a id="change_white" href='../vegetables/index.php?page=1&&type=chinese'>Chinese</a></li>
                    <li><a id="change_white" href='../vegetables/index.php?page=1&&type=indian'>Indian</a></li>
                </ul>
            </div>
        </div>
        <div class="category_anchor">
            <div class="myDIV">
                <a id="change_white" href="../seafood" class="category <?php echo $seafood; ?>">Seafood</a>
            </div>
            <div class="hide"> 
                <ul class="sub_cat">
                    <li><a id="change_white" href='../seafood/index.php?page=1&&type=myanmar'>Myanmar</a></li>
                    <li><a id="change_white" href='../seafood/index.php?page=1&&type=chinese'>Chinese</a></li>
                    <li><a id="change_white" href='../seafood/index.php?page=1&&type=indian'>Indian</a></li>
                </ul>
            </div>
        </div>
        <div class="category_anchor" style="margin-left: 18px;">
            <div class="myDIV">
                <a id="change_white" href="../meat" class="category <?php echo $meat; ?>">Meat</a>
            </div>
            <div class="hide"> 
                <ul class="sub_cat">
                    <li><a id="change_white" href='../meat/index.php?page=1&&type=myanmar'>Myanmar</a></li>
                    <li><a id="change_white" href='../meat/index.php?page=1&&type=chinese'>Chinese</a></li>
                    <li><a id="change_white" href='../meat/index.php?page=1&&type=indian'>Indian</a></li>
                </ul>
            </div>
        </div>
        <div class="category_anchor" style="margin-left: -5px;">
            <div class="myDIV">
                <a id="change_white" href="../soup" class="category <?php echo $soup; ?>">Soup</a>
            </div>
            <div class="hide"> 
                <ul class="sub_cat">
                    <li><a id="change_white" href='../soup/index.php?page=1&&type=myanmar'>Myanmar</a></li>
                    <li><a id="change_white" href='../soup/index.php?page=1&&type=chinese'>Chinese</a></li>
                    <li><a id="change_white" href='../soup/index.php?page=1&&type=indian'>Indian</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a href="../inc/category.inc.php">
            <button class="menu_button"></button>
        </a>
    </div>
</div>
<br><br>