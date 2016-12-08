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

          $query2 = "SELECT uid FROM users ORDER BY uid DESC LIMIT 1;";
          $last_uid = mysqli_query($connection, $query2);
          echo $last_uid;

          $locations_file = $name.'.json';
          echo $locations_file;
          fopen('data/'.$locations_file, 'w');

          if($connection){
            echo "<br>new record created";
          }else{
            echo $connection->error;
          }

          mysqli_query($connection, $query);

          mysqli_close($connection);
        }

      ?>
    </div>
<?php require_once 'footer.php'; ?>