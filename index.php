<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Login</h2>
      <form method="post" action="#">
        <label>Username or e-mail
          <input type="text" name="login" class="form-control" required><br>
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
          if (empty($_POST['login']) || empty($_POST['pw']) ){
            echo 'you left something blank';
          }else{
            $name= $_POST['login'];
            $email = $_POST['login'];
            $pw = $_POST['pw'];

            // home
            $connection = mysqli_connect("localhost","root","root","ptt");

            // school
//            $connection = mysqli_connect("localhost","root","","ptt");

            $query = "SELECT * FROM users WHERE ( name='$name' OR email='$email') AND pw='$pw' ";

            $loginCheck = mysqli_query($connection, $query);

            $row = mysqli_num_rows($loginCheck);

            if($row == 1){
              while($row = mysqli_fetch_assoc($loginCheck) ){
                $_SESSION["name"] = $row["name"];
                $_SESSION['loggedin'] = 1;

                header("location: map.php");
              }
            }else{
              echo 'try again';
            }
            mysqli_close($connection);
          }
        }
      ?>
    </div>
<?php require_once 'footer.php'; ?>