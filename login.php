<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Document</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Login</h2>
      <form method="post" action="login.php">
        <label>E-mail
          <input type="email" name="email" class="form-control" required><br>
        </label>
          <br>
        <label>Password
          <input type="password" name="pw" class="form-control" required><br>
        </label>
        <br>
        <input type="submit" name="submit" value="Submit">
      </form>
      <?php
        if(isset($_POST['submit'])){
          if (empty($_POST['email']) || empty($_POST['pw']) ){
            echo 'you left something blank';
          }else{
            $email = $_POST['email'];
            $pw = $_POST['pw'];

            $connection = mysqli_connect("localhost","root","root","ptt");

            $query = "SELECT * FROM users WHERE pw='$pw' AND email='$email' ";

            $loginCheck = mysqli_query($connection, $query);

            $row = mysqli_num_rows($loginCheck);

            if($row == 1){
              while($row = mysqli_fetch_assoc($loginCheck) ){
                $_SESSION["name"] = $row["name"];
                echo $_SESSION["name"].'<br>';

                echo "<a href='profile.php'>proceed to profile</a>";
              }
            }else{
              echo 'try again';
            }
            mysqli_close($connection);
          }
        }
      ?>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>