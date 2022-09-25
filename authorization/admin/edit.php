<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cooking Guide</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/screen.css">
</head>
<body>
<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = 1;
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<h1>Edit</h1>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

  <label for="title">Name</label>
  <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" required>

  <label for="title">Email</label>
  <input type="text" name="email" id="email" value="<?php echo $row['email'] ?>" required>

  <label for="title">New Password</label>
  <input type="password" name="password" id="password">

  <div class="submit_button">
    <input type="submit" value="Update">
    <a href="info.php">Back</a>
  </div>
</form>
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.validate.js"></script>
<script src="../../js/formValidate.js"></script>
</body>
</html>
