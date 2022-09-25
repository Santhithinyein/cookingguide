<?php
  include("../confs/auth.php");
  include("../confs/config.php");

  $total = mysqli_query($conn, "SELECT id FROM sub_categories");
  $total = mysqli_num_rows($total);

  # Paging
  $limit = 3;
  $start = 0;
  if(isset($_GET['start'])) {
    $start = $_GET['start'];
  }

  $next = $start + $limit; 
  $prev = $start - $limit;

  $result = mysqli_query($conn, "SELECT * FROM sub_categories ORDER BY created_at DESC LIMIT $start, $limit");
?>
<h1>Sub Categories</h1>
<?php include('../inc/menu.php'); ?>
<ul class="list">
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <li>
      <b id="sub_category">
        <?php echo $row['name'] ?> &nbsp;( <?php echo $row['main_category']; ?> )
      </b>
    </li>
  <?php endwhile; ?>
</ul>

<!-- must use pop up dialog box -->
<a href="new.php?start=<?php echo $start; ?>" class="new show">New</a>

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
