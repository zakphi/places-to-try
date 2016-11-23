function init() {
  var myOptions = {
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl: true,
    panControlOptions: {
      position: google.maps.ControlPosition.TOP_RIGHT
    },
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.DEFAULT,
      position: google.maps.ControlPosition.TOP_RIGHT
    }
  };

  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

  // https://toddmotto.com/using-html5-geolocation-to-show-current-location-with-google-maps-api/
  navigator.geolocation.getCurrentPosition(function(pos) {
    var geolocate = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);

    var user_loc_marker = new google.maps.Marker({
      map: map,
      position: geolocate,
    });

    user_loc_marker.addListener('click', function() {
      alert('your location');
    });
  
    map.setCenter(geolocate);
    
  });
  
  $.ajax({
    url:"locations.json",
    type:"get",
    dataType:"json",
    error:function(data){
      console.log(data.parsererror);
    },
    success:function(data){
      $.each(data, function(index,value){
        var id = value.id;
        var name = value.name;
        var address = value.address;
        var city = value.city;
        var state = value.state;
        var zip = value.zip;
        var lat = value.lat;
        var lng = value.lng;
        var latlngset = new google.maps.LatLng(lat, lng);
    
        var content = '<div class="info-window "><h3>' + name + '</h3>' + address + '<br>' + city + ', ' + state + ' ' + zip + '<br><a href="http://maps.google.com/?daddr=' + address + ' ' + city + ', ' + state + ' ' + zip + '" target="_blank">Get Directions</a></div>';

        content += '<a href="edit.php">Edit</a>';

        var marker = new google.maps.Marker({
          map: map,
          title: city,
          position: latlngset
        });

        marker.addListener('click', (function(marker, content) {
          return function() {
              info_window.setContent(content);
              info_window.open(map, marker);
          }
        })(marker, content));
      });
    }
  });

  var info_window = new google.maps.InfoWindow();
}

$('.menu-btn button').click(function() {
  $(this).siblings('.menu').addClass('open');
});

$('.close-btn').click(function() {
  $('.menu').removeClass('open');  
});
