<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once "nav.php"; ?>
      <h2>Register</h2>
      <form method="post" action="reg.php">
        <label class="fname">First Name
          <input type="text" name="fname" class="form-control" required>
        </label>
        <label class="lname">Last Name
          <input type="text" name="lname" class="form-control" required>
        </label>
        <label>Username
          <input type="text" name="un" class="form-control" required>
        </label>
        <label>E-mail
          <input type="email" name="email" class="form-control" required>
        </label>
        <label>Password
          <input type="password" name="pw" class="form-control" required>
        </label>
        <button type="submit" name="submit" id="submit">Submit</button>
      </form>
      <?php
        if(isset($_POST['submit'])){
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $un = $_POST['un'];
          $email = $_POST['email'];
          $pw = $_POST['pw'];

          require_once 'dbconnect.php';

          $reg_query = "INSERT INTO users (`uid`, `time`, `fname`, `lname`, `un`, `email`, `pw`)
          VALUES (NULL, NULL, '$fname', '$lname', '$un', '$email', '$pw');";

          $lc_query = "SELECT * FROM users WHERE ( un='$un' OR email='$email') AND pw='$pw' ";

          $login_check = mysqli_query($con, $lc_query);

          $row = mysqli_num_rows($login_check);

          if($row == 1){
            echo "<div class='error'>user already exists</div>";
          }else{
            mysqli_query($con, $reg_query);

            $last_uid_query = "SELECT uid FROM users ORDER BY uid DESC LIMIT 1;";
            $last_uid = mysqli_query($con, $last_uid_query);
            $last_uid_arr = mysqli_fetch_array($last_uid);

            $new_last_uid = $last_uid_arr['uid'];
            $new_last_uid = str_pad($new_last_uid, 4, "0", STR_PAD_LEFT);

            $_SESSION['uid'] = $new_last_uid;

            $locations_file = $un.'_'.$new_last_uid.'.json';

            fopen('data/'.$locations_file, 'w');

            $_SESSION['loggedin'] = 1;
            $_SESSION['fname'] = $fname;
            $_SESSION['un'] = $un;

            header("location: add.php");
          }

          mysqli_close($con);
        }

      ?>
    </div>
<?php require_once 'footer.php'; ?>
