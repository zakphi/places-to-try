<html>
  <head>
    <title>Places to Try</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  
	<body>
    <div class="container-fluid">
      <?php require_once 'nav.php'; ?>
      <div class="row">
        <div id="map_canvas"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table id="locations-table">
            <h2>Table View</h2>
            <tr id="table-head"></tr>
          </table>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjf0uAhv8nPnIC2v245aqnO7pVwCJuZTs&callback=init">
    </script>
    <script type="text/javascript" src="js/main.js"></script>
	</body>

</html>
