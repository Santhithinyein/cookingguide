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
<br>
<?php if(isset($_GET['login'])): ?>
  <?php if($_GET['login'] == "success"): ?>
    <div class="error_warning">Logout Success.</div>
  <?php endif; ?>

  <?php if($_GET['login'] == "failed"): ?>
    <div class="error_warning">Login failed! User name or password incorrect.</div>
  <?php endif; ?>
<?php endif; ?>

<form action="login.php" method="post" id="commentForm">
  <label for="email">E mail</label>
  <input type="text" id="email" name="email" required>

  <label for="password">Password</label>
  <input type="password" id="password" name="password" required>
  <br><br>
  <input type="checkbox" onclick="myPass()">Show Password

  <br><br>

  <input type="submit" value="Admin Login" class="login_button">
  <br><br>
  <a href="reset-password.php" class="forget_password"><small>Forget password ?</small></a>
</form>