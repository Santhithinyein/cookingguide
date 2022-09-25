<?php
    // code will be here
    include("../confs/auth.php");
    include("../confs/config.php");
  
    $id = $_GET['id'];
    $start = $_GET['start'];
    $result = mysqli_query($conn, "SELECT * FROM vegetables WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <input type="hidden" name="start" value="<?php echo $start; ?>">

  <label for="title">Name (Eng)</label>
  <input type="text" name="name_eng" id="name_eng" value="<?php echo $row['name_eng']; ?>" required>
  <p class="warning" id="warning-name_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="title">Name (MM)</label>
  <input type="text" name="name_mm" id="name_mm" value="<?php echo $row['name_mm']; ?>" required>
  <p class="warning" id="warning-name_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">Ingredients (Eng)</label>
  <textarea name="ingredients_eng" id="ingredients_eng" required><?php echo $row['ingredients_eng']; ?></textarea>
  <p class="warning" id="warning-ingredients_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">Ingredients (MM)</label>
  <textarea name="ingredients_mm" id="ingredients_mm" required><?php echo $row['ingredients_mm']; ?></textarea>
  <p class="warning" id="warning-ingredients_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">About (Eng)</label>
  <textarea name="about_eng" id="about_eng" required><?php echo $row['about_eng']; ?></textarea>
  <p class="warning" id="warning-about_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">About (MM)</label>
  <textarea name="about_mm" id="about_mm" required><?php echo $row['about_mm']; ?></textarea>
  <p class="warning" id="warning-about_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="sub_category">Sub Category</label>
  <?php $result_sub_categories = mysqli_query($conn, "SELECT * FROM sub_categories WHERE main_category = 'vegetables'"); ?>
  <select name="sub_category">
    <?php
      while($row_sub_categories = mysqli_fetch_assoc($result_sub_categories)):
    ?>
      <option value="<?php echo $row_sub_categories['id'] ?>" <?php if($row['sub_category'] == $row_sub_categories['id']){ echo 'selected'; } ?>><?php echo $row_sub_categories['name']; ?></option>
    <?php
      endwhile;
    ?>
  </select>

  <label for="type">Type</label>
  <select name="type">
    <option value="myanmar" <?php if($row['type'] == 'myanmar'){ echo 'selected'; } ?>>Myanmar</option>
    <option value="chinese" <?php if($row['type'] == 'chinese'){ echo 'selected'; } ?>>Chinese</option>
    <option value="indian" <?php if($row['type'] == 'indian'){ echo 'selected'; } ?>>Indian</option>
  </select>

  <?php $photo = $row['photo']; ?>

  <br><br>
    <?php if(!is_dir("../../images/{$row['photo']}") and file_exists("../../images/{$row['photo']}")) : ?>
      <div class="book_image_detail_parent">
        <img src="../../images/<?php echo $photo; ?>" class="book_image_detail">
      </div>
    <?php else : ?>
      <div class="book_image_detail_parent">
        <img src="../../images/no-cover.gif" class="book_image_detail">
      </div>
    <?php endif; ?>
  <label for="cover">Photo</label>
  <input type="file" name="photo" required>

  <div class="submit_button">
    <input type="submit" value="Update">
  </div>
</form>