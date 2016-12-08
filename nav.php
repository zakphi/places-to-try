<div class="row" id="header">
  <div class="col-md-11 col-xs-11">
    <h1>Places to Try</h1>
  </div>
  <div class="col-md-1 col-xs-1">
    <a class="menu-btn">Menu</a>
  </div>
  <div class="menu">
    <a class="close-btn">&times;</a>
    <?php
      if($loggedin == 0){
        echo '<button class="login-btn"><a href="login.php">login</a></button>';
        echo '<button class="reg-btn"><a href="reg.php">register</a></button>';
      }
      else {
        echo '
          <h2>Hello <span class="un">'.$_SESSION["name"].'</span></h2>
          <div class="loggedin-nav">
          <ul>
            <li><button><a href="index.php">Home</a></li></button>
            <li><button><a href="add.php">Add</a></li></button>
          </ul>
          <div class="view-btns">
            <button class="map-btn button-clicked">Map View</button>
            <button class="table-btn">Table View</button>
          </div>
          <button class="logout-btn"><a href="logout.php">logout</a></button>
        </div> ';
    } ?>
  </div>
</div>