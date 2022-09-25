<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cooking Guide</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/screen.css">
  <link rel="icon" type="image/png" href="../../icons/chef.png" />
</head>
<body>
<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = $_GET['id'];
  $start = $_GET['start'];
  $result = mysqli_query($conn, "SELECT * FROM vegetables WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<h1>Edit Receipe</h1>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <input type="hidden" name="start" value="<?php echo $start; ?>">

  <label for="title">Name (Eng)</label>
  <input type="text" name="name_eng" id="name_eng" value="<?php echo $row['name_eng'] ?>" required>

  <label for="title">Name (MM)</label>
  <input type="text" name="name_mm" id="name_mm" value="<?php echo $row['name_mm'] ?>" required>

  <label for="summary">Ingredients (Eng)</label>
  <textarea name="ingredients_eng" id="ingredients_eng" required><?php echo $row['ingredients_eng']; ?></textarea>

  <label for="summary">Ingredients (MM)</label>
  <textarea name="ingredients_mm" id="ingredients_mm" required><?php echo $row['ingredients_mm']; ?></textarea>

  <label for="summary">About (Eng)</label>
  <textarea name="about_eng" id="about_eng" required><?php echo $row['about_eng']; ?></textarea>

  <label for="summary">About (MM)</label>
  <textarea name="about_mm" id="about_mm" required><?php echo $row['about_mm']; ?></textarea>

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

  <br><br>
  <?php
    if(!is_dir("../../images/{$row['photo']}") and file_exists("../../images/{$row['photo']}")) {
      $photo=$row['photo'];
      echo "<img src='../../images/{$row["photo"]}' alt='' height='150' class='normal_edit'>";
    }
    else {
      echo "<img src='../../images/no-cover.gif' alt='' height='150'>";
    }
  ?>
  <label for="cover">Change Photo</label>
  <input type="file" name="photo" id="cover">

  <br><br>
  <div class="submit_button">
    <input type="submit" value="Update">
    <a href="list.php?start=<?php echo $start; ?>">Back</a>
  </div>
</form>
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.validate.js"></script>
<script src="../../js/formValidate.js"></script>
</body>
</html>
