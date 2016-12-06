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
        <input type="submit" name="submit" class="btn btn-default" value="Submit">
      </form>
      <?php
        if(isset($_POST['submit'])){
          if (empty($_POST['email']) || empty($_POST['pw']) ){
            echo 'you left something blank';
          }else{
            $email = $_POST['email'];
            $pw = $_POST['pw'];

            // school
            // $connection = mysqli_connect("localhost","root","","reg");
            // home
            $connection = mysqli_connect("localhost","root","root","ptt");

            $query = "SELECT * FROM users WHERE pw='$pw' AND email='$email' ";

            $loginCheck = mysqli_query($connection, $query);

            $row = mysqli_num_rows($loginCheck);

//            echo $row;
//
//            echo '<br>';

            if($row == 1){
              while($row = mysqli_fetch_assoc($loginCheck) ){
//                $_SESSION["uid"] = $row["uid"];
//                echo $_SESSION["uid"].'<br>';
//
//                $_SESSION["time"] = $row["time"];
//                echo $_SESSION["time"].'<br>';

                $_SESSION["name"] = $row["name"];
                echo $_SESSION["name"].'<br>';

//                $_SESSION["email"] = $row["email"];
//                echo $_SESSION["email"].'<br>';
//
//                $_SESSION["pw"] = $row["pw"];
//                echo $_SESSION["pw"].'<br>';

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