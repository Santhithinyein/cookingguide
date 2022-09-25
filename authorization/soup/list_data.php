<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $total = mysqli_query($conn, "SELECT id FROM soup");
  $total = mysqli_num_rows($total);

  # Paging
  $limit = 3;
  $start = 0;
  if(isset($_GET['start'])) {
    $start = $_GET['start'];
  }

  $next = $start + $limit; 
  $prev = $start - $limit;

  $result = mysqli_query($conn, "SELECT * FROM soup ORDER BY created_at DESC LIMIT $start, $limit");
?>
<h1>Soup</h1>
<?php include('../inc/menu.php'); ?>
<ul class="list">
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <li>
      <b><?php echo $row['name_eng'] ?></b>
      <?php
        if(!is_dir("../../images/{$row['photo']}") and file_exists("../../images/{$row['photo']}")) {
          $cover = $row['photo'];
          $id = $row['id'];
          echo "<a href='detail.php?id=$id&&start=$start' class='show'><image src='../../images/$cover' height='140' class='larger_screens_photo'></a>";
        }
        else {
          echo "<image src='../../images/no-cover.gif' height='140' class='larger_screens_photo'>";
        }
      ?>

      <?php
        echo "<a href='detail.php?id=$id&&start=$start' class='show'><image src='../../images/$cover' alt='' class='mobile_screens_photo' align='right' style='width:100%;';></a>";
      ?>
      <br>
      [ <a href="delete.php?id=<?php echo $row['id'] ?>&&start=<?php echo $start; ?>"
      			class="del delete" onClick="return confirm('Are you sure?')">del</a> ]
      [ <a href="edit.php?id=<?php echo $row['id'] ?>&&start=<?php echo $start; ?>" class="show">edit</a> ]
    </li>
  <?php endwhile; ?>
</ul>

<!-- must use pop up dialog box -->
<a href="new.php?start=<?php echo $start; ?>" class="new show">New Receipe</a>

<div class="paging">
  <?php
    if($prev<0) {
      echo "<span>&laquo; Previous</a>";
    }else{
      echo "<a href='list.php?start=$prev' class='pagination'>&laquo; Previous</a>";
    }
    if($next>=$total) {
      echo "<span>Next &raquo;</span>";
    }else{
      echo "<a href='list.php?start=$next' class='pagination'>Next &raquo;</a>";
    }
  ?>
</div>
