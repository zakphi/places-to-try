<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Login</h2>
      <form method="post" action="#">
        <label>Username or e-mail
          <input type="text" name="login" class="form-control" required>
        </label>
        <label>Password
          <input type="password" name="pw" class="form-control" required>
        </label>
        <p>New User? <a href="reg.php">Sign Up!</a></p>
        <button type="submit" name="submit">Submit</button>
      </form>
      <?php
        if( isset($_SESSION['loggedin']) ){
          header("location: map.php");
        }
        if(isset($_POST['submit'])){
          if (empty($_POST['login']) || empty($_POST['pw']) ){
            echo 'you left something blank';
          }else{
            $un = $_POST['login'];
            $email = $_POST['login'];
            $pw = $_POST['pw'];

            require_once 'dbconnect.php';

            $query = "SELECT * FROM users WHERE ( un='$un' OR email='$email') AND pw='$pw' ";

            $login_check = mysqli_query($con, $query);

            $row = mysqli_num_rows($login_check);

            if($row == 1){
              while($row = mysqli_fetch_assoc($login_check) ){
                $_SESSION["fname"] = $row["fname"];
                $_SESSION["un"] = $row["un"];
                $_SESSION['uid'] = str_pad($row['uid'], 4, "0", STR_PAD_LEFT);
                $_SESSION['loggedin'] = 1;

                header("location: map.php");
              }
            }else{
              echo 'try again';
            }
            mysqli_close($con);
          }
        }
      ?>
    </div>
<?php require_once 'footer.php'; ?>
