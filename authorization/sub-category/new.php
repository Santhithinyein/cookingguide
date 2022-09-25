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
<h1>New Sub Category</small></h1>
<form action="add.php" method="post" enctype="multipart/form-data" id="commentForm">
  <label for="title">Name</label>
  <input type="text" name="name" id="name" required>

  <br><br>

  <label for="main_category">Main Category</label>
  <select name="main_category">
     <option value="vegetables">Vegetables</option>
     <option value="seafood">Seafood</option>
     <option value="meat">Meat</option>
     <option value="soup">Soup</option>
  </select>

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

