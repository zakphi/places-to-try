<?php require_once 'header.php';
  // echo $_SESSION['un'];
  $json_file = 'data/'.$_SESSION['un'].'_'.$_SESSION['uid'].'.json';
  // echo $json_file;
  if( filesize($json_file) == 0 ){
    echo "<script> var json_file = 'data/locations.json'; </script>";
  }else{
    echo "<script> var json_file = '$json_file'; </script>";
  }
?>
  <body class="map">
    <div class="container-fluid">
      <?php require_once 'nav.php'; ?>
      <div class="row">
        <div id="map_canvas"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table id="locations-table" class="table">
            <tr id="table-head"></tr>
          </table>
        </div>
      </div>
    </div>
<?php require_once 'footer.php'; ?>