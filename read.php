<?php
    require('config.php');
   ?>
  <?php
      $con = mysqli_connect(SERVER_NAME, "root", "root", DB_NAME);
      if(!$con) {
        die("Error: "+mysqli_connect_error());
      }
      $id = $_GET['id'];
      $query = "SELECT *  FROM blogs WHERE id=".$id ;
      $q = mysqli_query($con, $query);
      if(!$q) {
        die("Error: ".mysqli_error($con));
      }
      $blogs = mysqli_fetch_assoc($q);
      //var_dump($blogs);
      mysqli_free_result($q);
      mysqli_close($con);
   ?>

<?php require('header.php'); ?>
<?php require('conf.php'); ?>
  <div class="container">
    <div class="form-group">
          <a href="<?php echo ROOT_DIR ?>" class="btn btn-default">Back</a>
        </div>
      <h2>Posts</h2>
      <div class="well">
        <h4><?php echo $blogs['title']; ?></h4>
        <small>Created On <?php echo $blogs['created_at']; ?> by <?php echo $blogs['author']; ?></small>
        <p><?php echo $blogs['message']; ?></p>

      </div>
</div>
<?php require('footer.php'); ?>
