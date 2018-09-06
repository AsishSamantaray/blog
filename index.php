<?php
    require('config.php');
   ?>
  <?php
      $con = mysqli_connect(SERVER_NAME, "root", "root", DB_NAME);
      if(!$con) {
        die("Error: "+mysqli_connect_error());
      }

      $query = "SELECT *  FROM blogs";
      $q = mysqli_query($con, $query);
      if(!$q) {
        die("Error: ".mysqli_error($con));
      }
      $blogs = mysqli_fetch_all($q,MYSQLI_ASSOC);
      //var_dump($blogs);
      mysqli_free_result($q);
      mysqli_close($con);
   ?>
<?php require('header.php'); ?>
  <div class="container">
      <h2>Posts</h2>
      <?php foreach($blogs as $blog) : ?>
      <div class="well">
        <h4><?php echo $blog['title']; ?></h4>
        <small>Created On <?php echo $blog['created_at']; ?> by <?php echo $blog['author']; ?></small>
        <p><?php echo $blog['message']; ?></p>
        <div class="form-group">
          <a href="read.php?id=<?php echo($blog['id']);?>" class="btn btn-default">Read More</a>
        </div>
      </div>

<?php endforeach; ?>
</div>
<?php require('footer.php'); ?>
