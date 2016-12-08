<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Register</h2>
      <form id="reg" method="post" action="reg.php">
      <label>Name
        <input type="text" name="name" class="form-control" required><br>
      </label>
      <br>
      <label>E-mail
        <input type="email" name="email" class="form-control" required><br>
      </label>
      <br>
      <label>Password
        <input type="password" name="pw" class="form-control" required><br>
      </label>
      <br>
      <input type="submit" name="submit" id="submit" value="Submit">
      </form>
      <?php
        if(isset($_POST['submit'])){
          $name= $_POST['name'];
          $email= $_POST['email'];
          $pw = $_POST['pw'];

          // home
          // $connection = mysqli_connect("localhost","root","root","ptt");

          // school
          $connection = mysqli_connect("localhost","root","","ptt");

          $query= "INSERT INTO users (`uid`, `time`, `name`, `email`, `pw`)
          VALUES (NULL, NULL, '$name','$email','$pw');";

          if($connection){
            echo "new record created";
          }else{
            echo $connection->error;
          }

          mysqli_query($connection, $query);

          mysqli_close($connection);
        }

      ?>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>