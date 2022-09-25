<?php
    include("../confs/auth.php");
    include("../confs/config.php");
    include("../../inc/GetDBRecords.inc.php");

    $total = mysqli_query($conn, "SELECT id FROM comments");
    $total = mysqli_num_rows($total);

    # Paging
    $limit = 10;
    $start = 0;
    $no = 1;

    if(isset($_GET['start'])) {
        $start = $_GET['start'];
    }

    $next = $start + $limit; 
    $prev = $start - $limit;
   
    $no = $no + $start; // calculate start no 

    $result = mysqli_query($conn, "SELECT * FROM comments ORDER BY created_at DESC LIMIT $start, $limit");
?>
<h1>Feedbacks</h1>
<?php include('../inc/menu.php'); ?>
<!-- only loop through comment table -->
<div class="table_parent">
  <table>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Points</th>
      <th width="30%">Comment</th>
      <th width="20%">Dish Name</th>
      <th width="10%">Category</th>
      <th width="20%">Sub Category</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $row['name']; ?></td>
           <td><?php echo $row['email']; ?></td>
           <td>
            <?php
              $point = get_ratings_for_feedbacks($row['email'],$row['category'],$row['respective_id']);
              if($point > 0) {
                echo $point;
              } else {
                echo "0";
              }
            ?>
           </td>
           <td>
              <?php
                $comment = words_limit_2($row['comment']);
                echo $comment;
              ?>
           </td>
           <td>
              <?php
                $dish_name = get_detail_record($row['category'],$row['respective_id']);
                $row_dish_name = mysqli_fetch_assoc($dish_name);
                $sub_cat_id = $row_dish_name['sub_category'];
                echo $row_dish_name['name_eng']; 
              ?>
           </td>
           <td><?php echo $row['category'] ?></td>
           <td>
              <?php
                $sub_category = get_sub_category_info($sub_cat_id);
                $row_sub_category = mysqli_fetch_assoc($sub_category);
                echo $row_sub_category['name'];
              ?>
           </td>
        </tr>
    <?php
        $no++; // increase number 
        endwhile; 
    ?>
  </table>
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
</div>
