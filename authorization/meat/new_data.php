<?php
	include("../confs/auth.php");
	include("../confs/config.php");
?>
<form action="add.php" method="post" enctype="multipart/form-data" id="commentForm">
  <label for="title">Name (Eng)</label>
  <input type="text" name="name_eng" id="name_eng" required>
  <p class="warning" id="warning-name_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="title">Name (MM)</label>
  <input type="text" name="name_mm" id="name_mm" required>
  <p class="warning" id="warning-name_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">Ingredients (Eng)</label>
  <textarea name="ingredients_eng" id="ingredients_eng" required></textarea>
  <p class="warning" id="warning-ingredients_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">Ingredients (MM)</label>
  <textarea name="ingredients_mm" id="ingredients_mm" required></textarea>
  <p class="warning" id="warning-ingredients_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">About (Eng)</label>
  <textarea name="about_eng" id="about_eng"  required></textarea>
  <p class="warning" id="warning-about_eng">
    <i><small>This field is required</small></i>
  </p>

  <label for="summary">About (MM)</label>
  <textarea name="about_mm" id="about_mm"  required></textarea>
  <p class="warning" id="warning-about_mm">
    <i><small>This field is required</small></i>
  </p>

  <label for="sub_category">Sub Category</label>
  <?php $result = mysqli_query($conn, "SELECT * FROM sub_categories WHERE main_category = 'meat'"); ?>
  <select name="sub_category">
    <?php
      while($row = mysqli_fetch_assoc($result)):
    ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php
      endwhile;
    ?>
  </select>

  <label for="type">Type</label>
  <select name="type">
    <option value="myanmar">Myanmar</option>
    <option value="chinese">Chinese</option>
    <option value="indian">Indian</option>
  </select>

  <label for="cover">Photo</label>
  <input type="file" name="photo" id="photo" required>
  <p class="warning" id="warning-photo">
    <i><small>This field is required</small></i>
  </p>

  <div class="submit_button">
    <input type="submit" value="Add">
  </div>
</form>
