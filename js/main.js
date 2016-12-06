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
//    draggable: false,
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
        var address = value.location;
//        var city = value.city;
//        var state = value.state;
//        var zip = value.zip;
        var lat = value.lat;
        var lng = value.lng;
        var latlngset = new google.maps.LatLng(lat, lng);
        key_name = Object.keys(value);
        var address = address.split(',');
//        address[0] = address
//        address[1] = city
//        address[2] = state
//        address[3] = zip

        // var table_row = `<tr>
        //   <td id=`+key_name[0]+`>`+id+`</td>
        //   <td>`+name+`</td>
        //   <td>`+address+`</td>
        //   <td>`+city+`</td>
        //   <td>`+state+`</td>
        //   <td>`+zip+`</td>
        //   <td id=`+key_name[6]+`>`+lat+`</td>
        //   <td id=`+key_name[7]+`>`+lng+`</td>
        //   <td><a href="http://maps.google.com/?daddr=`+address+` `+city+`, `+state+` `+zip+`" target=_blank>Get Directions</a></td>
        // </tr>`;
        var table_row = `<tr>
          <td id=id>`+id+`</td>
          <td>`+name+`</td>
          <td>`+address[0]+`<span>,</span><br>`+address[1]+`<span>,</span><br>`+address[2]+`<span>,</span><br>`+address[3]+`</td>
          <td id=lat>`+lat+`</td>
          <td id=lng>`+lng+`</td>
          <td><a href="http://maps.google.com/?daddr=` + address[0] + address[1] + address[2] + address[3] + `" target="_blank">Get Directions</a></td>
        </tr>`;
        $('#locations-table').append(table_row);

        var content = `<div class="info-window "><h3>` + name + `</h3>` + address[0] + `<br>` + address[1] + `, ` + address[2] + ` ` + address[3] + `<br><a href="http://maps.google.com/?daddr=` + address[0] + address[1] + address[2] + address[3] + `" target="_blank">Get Directions</a></div>`;

//        content += '<a href="edit.php">Edit</a>';

        var marker = new google.maps.Marker({
          map: map,
          title: address[1],
          position: latlngset
        });

        marker.addListener('click', (function(marker, content) {
          return function() {
            info_window.setContent(content);
            info_window.open(map, marker);
          }
        })(marker, content));
      });
      for(var i=0;i<key_name.length+1;++i){
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

$('#add_location').submit( function(e){
  var formData = new FormData($(this)[0]);
  $.ajax({
    url:"ajaxprocess.php",
    type:"post",
    data:formData,
    async:false,
    success:function(msg){ console.log(msg); },
    cache:false,
    contentType:false,
    processData:false
  });
  e.preventDefault();
});

$('.map-btn').click(function() {
  $('#map_canvas').css('display','block');
  $('#locations-table').css('display','none');

  $(this).addClass('button-clicked');
  $('.table-btn').removeClass('button-clicked');
});

$('.table-btn').click(function() {
  $('#map_canvas').css('display','none');
  $('#locations-table').css('display','block');

  $(this).addClass('button-clicked');
  $('.map-btn').removeClass('button-clicked');
});

if( $('body').hasClass('home') ){
	$('.view-btns').css('display','block');
}