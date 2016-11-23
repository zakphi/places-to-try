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
      <div class="row" id="header">
        <div class="col-md-11 col-xs-11">
          <h1>Places to Try</h1>
        </div>
        <div class="col-md-1 col-xs-1 menu-btn">
          <button>Menu</button>
          <div class="menu">
            <a class="close-btn">&times;</a>
            <!--<p>Hello, user's name </p>-->
            <ul>
              <li><a href="add.php">Add</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="map_canvas"></div>
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
