  <?php
    require('header.php');
    require('config.php');
   ?>
  <?php
    $msg = "";
    if(isset($_POST['submit'])) {
      $con = mysqli_connect(SERVER_NAME, "root", "root", DB_NAME);
      if(!$con) {
        die("Error: "+mysqli_connect_error());
      }
      $title = $_POST['title'];
      $author = $_POST['author'];
      $message = $_POST['message'];

      $query = "INSERT INTO ".TABLE_NAME."(title, author
      , message) VALUES('$title', '$author', '$message')";
      $q = mysqli_query($con,$query);
      if(!$q) {
        die("Error: ".mysqli_error($con));
      }
      else {
        $msg = "Post uploaded Successfully...";
      }
      header('Location:index.php');
    }
   ?>

    <div class="container">
      <p><span class="msg" ><?php echo $msg; ?></span></p>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-info">
        </div>
      </form>
    </div>
<?php require('footer.php') ?>
