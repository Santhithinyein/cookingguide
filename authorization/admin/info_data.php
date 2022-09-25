<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $id = 1;
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>
<h1>Admin</h1>
<?php include('../inc/menu.php'); ?>
<ul class="list">
  <div style="height: 50vh;">
    <p class="word_break">
        <?php echo $row['name']; ?>
    </p>
    <p class="word_break">
        <?php echo $row['email']; ?>
    </p>
  </div>
</ul>

<!-- must use pop up dialog box -->
<a href="edit.php" class="new show">Edit</a>

