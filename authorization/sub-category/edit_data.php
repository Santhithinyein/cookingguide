<?php
    // code will be here
    include("../confs/auth.php");
    include("../confs/config.php");
  
    $id = $_GET['id'];
    $start = $_GET['start'];
    $result = mysqli_query($conn, "SELECT * FROM sub_categories WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <input type="hidden" name="start" value="<?php echo $start; ?>">

  <label for="title">Name</label>
  <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
  <p class="warning" id="warning-name">
    <i><small>This field is required</small></i>
  </p>

  <br><br>

  <label for="main_category">Main Category</label>
  <select name="main_category">
    <option value="vegetables" <?php if($row['main_category'] == 'vegetables'){ echo "selected"; }; ?>>Vegetables</option>
    <option value="seafood" <?php if($row['main_category'] == 'seafood'){ echo "selected"; }; ?>>Seafood</option>
    <option value="meat" <?php if($row['main_category'] == 'meat'){ echo "selected"; }; ?>>Meat</option>
    <option value="soup" <?php if($row['main_category'] == 'soup'){ echo "selected"; }; ?>>Soup</option>
  </select>

  <div class="submit_button">
    <input type="submit" value="Update">
  </div>
</form>