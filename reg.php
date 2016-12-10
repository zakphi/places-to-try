<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Register</h2>
      <form method="post" action="reg.php">
        <label>Name
          <input type="text" name="name" class="form-control test-li" required><br>
        </label>
        <br>
        <label>E-mail
          <input type="email" name="email" class="form-control" id="test-li-email" required><br>
        </label>
        <br>
        <label>Password
          <input type="password" name="pw" class="form-control test-li" required><br>
        </label>
        <br>
        <input type="submit" name="submit" id="submit" value="Submit">
      </form>
      <?php
        if(isset($_POST['submit'])){
          $name= $_POST['name'];
          $email= $_POST['email'];
          $pw = $_POST['pw'];

//        home
          $connection = mysqli_connect("localhost","root","root","ptt");

//          school
//          $connection = mysqli_connect("localhost","root","","ptt");

          $query= "INSERT INTO users (`uid`, `time`, `name`, `email`, `pw`)
          VALUES (NULL, NULL, '$name','$email','$pw');";

          $last_uid_query = "SELECT uid FROM users ORDER BY uid DESC LIMIT 1;";
          $last_uid = mysqli_query($connection, $last_uid_query);
          $last_uid_arr = mysqli_fetch_array($last_uid);
          $new_last_uid = $last_uid_arr['uid'];
          $new_last_uid = str_pad(++$new_last_uid, 4, "0", STR_PAD_LEFT);

          $locations_file = $name.'_'.$new_last_uid.'.json';
//          echo $locations_file.' file created';
          fopen('data/'.$locations_file, 'w');

          if($connection){
            echo "new record created";
//            header("location: add.php");
          }else{
            echo $connection->error;
          }

          mysqli_query($connection, $query);

          mysqli_close($connection);
        }

      ?>
    </div>
<?php require_once 'footer.php'; ?>