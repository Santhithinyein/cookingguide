<!DOCTYPE HTML>
<?php
	include("../confs/auth.php");
	include("../confs/config.php");
	$start = $_GET['start'];
?>
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
<h1>New Receipe</small></h1>
<form action="add.php" method="post" enctype="multipart/form-data" id="commentForm">
  <label for="title">Name ( Eng )</label>
  <input type="text" name="name_eng" id="name_eng" required>

  <label for="title">Name ( MM )</label>
  <input type="text" name="name_mm" id="name_mm" required>
  
  <label for="summary">Ingredients ( Eng )</label>
  <textarea name="ingredients_eng" id="ingredients_eng" required></textarea>

  <label for="summary">Ingredients ( MM )</label>
  <textarea name="ingredients_mm" id="ingredients_mm" required></textarea>

  <label for="summary">About ( Eng )</label>
  <textarea name="about_eng" id="about_eng" required></textarea>

  <label for="summary">About ( MM )</label>
  <textarea name="about_mm" id="about_mm" required></textarea>

  <label for="sub_category">Sub Category</label>
  <?php $result = mysqli_query($conn, "SELECT * FROM sub_categories WHERE main_category = 'seafood'"); ?>
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
  <input type="file" name="photo" required>

  <br><br>
  <div class="submit_button">
    <input type="submit" value="Add">
	  <a href="list.php?start=<?php echo $start; ?>" class="back">Back</a>
  </div>
</form>
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.validate.js"></script>
<script src="../../js/formValidate.js"></script>
</body>
</html>

