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
  $result = mysqli_query($conn, "SELECT * FROM sub_categories WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<h1>Edit Sub Category</h1>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <input type="hidden" name="start" value="<?php echo $start; ?>">

  <label for="title">Name</label>
  <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" required>

  <label for="main_category">Main Category</label>
  <select name="main_category">
    <option value="vegetables" <?php if($row['main_category'] == 'vegetables'){ echo "selected"; }; ?>>Vegetables</option>
    <option value="seafood" <?php if($row['main_category'] == 'seafood'){ echo "selected"; }; ?>>Seafood</option>
    <option value="meat" <?php if($row['main_category'] == 'meat'){ echo "selected"; }; ?>>Meat</option>
    <option value="soup" <?php if($row['main_category'] == 'soup'){ echo "selected"; }; ?>>Soup</option>
  </select>

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
