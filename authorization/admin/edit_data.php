<?php
    include("../confs/auth.php");
    include("../confs/config.php");
  
    $id = 1;
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<form action="update.php" method="post" enctype="multipart/form-data" id="commentForm">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

  <label for="title">Name</label>
  <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
  <p class="warning" id="warning-name">
    <i><small>This field is required</small></i>
  </p>

  <label for="title">Email</label>
  <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" required>
  <p class="warning" id="warning-email">
    <i><small>This field is required</small></i>
  </p>
  
  <label for="password">New Password</label>
  <input type="password" name="password" id="password">

  <div class="submit_button">
    <input type="submit" value="Update">
  </div>
</form>