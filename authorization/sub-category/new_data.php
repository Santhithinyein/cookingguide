<?php
	include("../confs/auth.php");
	include("../confs/config.php");
?>
<!-- cookingguide must be remove from form action in production mood (in server) -->
<form action="/cookingguide/authorization/sub-category/add.php" method="post" enctype="multipart/form-data" id="commentForm">
  <label for="title">Sub Category</label>
  <input type="text" name="name" id="name" required>
  <p class="warning" id="warning-name">
    <i><small>This field is required</small></i>
  </p>
  
  <br><br>

  <label for="main_category">Main Category</label>
  <select name="main_category">
    <option value="vegetables">Vegetables</option>
    <option value="seafood">Seafood</option>
    <option value="meat">Meat</option>
    <option value="soup">Soup</option>
  </select>

  <div class="submit_button_special">
    <input type="submit" value="Add">
  </div>
</form>
