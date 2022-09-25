<?php 
    include('../inc/header.inc.php'); 
    
    // if id,category and page not include, redirect back 
    if(!isset($_GET['id']) && !isset($_GET['page']) && !isset($_GET['cat']))
    {
        header("location: ../index.php");
    }

    $id = $_GET['id'];
    $page = $_GET['page'];
    $type = $_GET['type'];
    $category = $_GET['cat'];
?>   
    <div class="main_body_parent">
        <div class="float-right">
            <button class="back_button"><a href="../<?php echo $category ?>/index.php?id=<?php echo $id; ?>&&page=<?php echo $page; ?>"><img src="../icons/back.png"></a></button>
        </div>
        <br><br>
        <?php if(isset($_GET['email']) && $_GET['email'] == 'invalid') : ?>
            <div class="alert alert-dark" role="alert">
                This is email is already taken.
            </div> 
        <?php endif; ?>
        <form action="add-points.php" method="post">
            <input type="hidden" name="respective_id" value="<?php echo $id; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <input type="hidden" name="category" value="<?php echo $category; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            
            <label>Points :</label>
            <select class="show_points" name="points">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <br><br>
            <label>Email : </label>
            <input type="email" name="email">
            <br><br>
            <input type="submit" value="Add">
        </form>
    </div>
<?php include('../inc/footer.inc.php'); ?>