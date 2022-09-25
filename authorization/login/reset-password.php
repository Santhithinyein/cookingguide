<?php 
  include('../inc/header.inc.php'); 
?>
<?php
  session_start();
  if(isset($_SESSION['auth'])) {
    header("location: ../vegetables/list.php?login=success");
  }
?>

<h1>Login</h1>
<br>
<div class="admin_menu_parent">
    <a href="../../home" class="admin_menu">Home</a>
    <a href="../../authorization" class="admin_menu">Admin</a>
    <a href="../../vegetables" class="admin_menu">User</a>
    &nbsp;&nbsp;&nbsp;
</div>
<br><br>
<?php if(isset($_GET['key'])): ?>
  <?php if($_GET['key'] == "invalid"): ?>
    <div class="error_warning">Secret Key not correct</div>
  <?php endif; ?>
<?php endif; ?>

<form action="change-password.php" method="post" id="commentForm">
  <label for="password">Secret Code</label>
  <input type="password" id="secret_key" name="secret_key" required>

  <label for="password">New Password</label>
  <input type="password" id="password" name="password" required>
  <br><br>
  <input type="checkbox" onclick="myPass()">Show Password
  <br><br>
  <input type="submit" value="Submit">
</form>
<?php
  include('../inc/footer.inc.php');
?>