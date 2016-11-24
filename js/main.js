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
    },
    scrollwheel: false,
    draggable: false,
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

  var info_window = new google.maps.InfoWindow();

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
        key_name = Object.keys(value);

        var table_row = `<tr>
          <td id=`+key_name[0]+`>`+id+`</td>
          <td>`+name+`</td>
          <td>`+address+`</td>
          <td>`+city+`</td>
          <td>`+state+`</td>
          <td>`+zip+`</td>
          <td id=`+key_name[6]+`>`+lat+`</td>
          <td id=`+key_name[7]+`>`+lng+`</td>
        </tr>`;
        $('#locations-table').append(table_row);

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
      for(var i=0;i<key_name.length;++i){
        $('#table-head').append("<th id="+key_name[i]+">"+key_name[i]+"</th>");
      }
    }
  });
}

$('.menu-btn').click(function() {
  $('.menu').addClass('open');
});

$('.close-btn').click(function() {
  $('.menu').removeClass('open');
});
