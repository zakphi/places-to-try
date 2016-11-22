function init() {
  var myOptions = {
    zoom: 13,
    // center: new google.maps.LatLng(40.696909,-74.014721),
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

    var marker2 = new google.maps.Marker({
      map: map,
      position: geolocate,
    });

    marker2.addListener('click', function() {
      alert('your location');
    });
  
    map.setCenter(geolocate);
    
  });

  var locations = [
    {name:"Restaurant",address:"350 Grand Street",city:"New York",state:"NY",zip:"10002",lat:"40.717404",lng:"-73.989611"},
    {name:"Restaurant",address:"227 Bowery",city:"New York",state:"NY",zip:"10002",lat:"40.721982",lng:"-73.992836"},
    {name:"Restaurant",address:"42 West 18th St",city:"New York",state:"NY",zip:"10011",lat:"40.739356",lng:"-73.993962"},
    {name:"Restaurant",address:"50 Madison Ave",city:"New York",state:"NY",zip:"10010",lat:"40.743063",lng:"-73.986613"},
    {name:"Restaurant",address:"94 Washington St",city:"Hoboken",state:"NJ",zip:"07030",lat:"40.737145",lng:"-74.030934"},
    {name:"Restaurant",address:"280 Grove Street",city:"Jersey City",state:"NJ",zip:"07302",lat:"40.731997",lng:"-74.041112"},
    {name:"Restaurant",address:"350 Montgomery St",city:"Jersey City",state:"NJ",zip:"07302",lat:"40.731997",lng:"-74.041112"},
    {name:"Restaurant",address:"110 Wolcott St",city:"Brooklyn",state:"NY",zip:"11231",lat:"40.677872",lng:"74.012985"},
    {name:"Restaurant",address:"1 Beard St",city:"Brooklyn",state:"NY",zip:"11231",lat:"40.672225",lng:"-74.011139"},
    {name:"Restaurant",address:"95 Greenwich St",city:"New York",state:"NY",zip:"10282",lat:"40.672225",lng:"-74.011139"},
    {name:"Restaurant",address:"17 Bowery St",city:"New York",state:"NY",zip:"10002",lat:"40.714688",lng:"-73.996827"},
    {name:"Restaurant",address:"4 Nevins St",city:"New York",state:"NY",zip:"11217",lat:"40.688522",lng:"-73.981099"},
    {name:"Restaurant",address:"767 Hicks St",city:"New York",state:"NY",zip:"11231",lat:"40.676692",lng:"-74.004466"}
  ];

  var info_window = new google.maps.InfoWindow();

  for (var i = 0; i < locations.length; i++) {
    var name = locations[i].name;
    var address = locations[i].address;
    var city = locations[i].city;
    var state = locations[i].state;
    var zip = locations[i].zip;
    var lat = locations[i].lat;
    var lng = locations[i].lng;
    var latlngset = new google.maps.LatLng(lat, lng);
    
    var content = '<div class="info-window"><h3>' + name + '</h3>' + address + '<br>' + city + ', ' + state + ' ' + zip + '<br><a href="http://maps.google.com/?daddr=' + address + ' ' + city + ', ' + state + ' ' + zip + '" target="_blank">Get Directions</a></div>';

    content += '<a href="edit.html">Edit</a>';
    
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
  }
}

$(document).ready(function() {
  $('.menu-btn button').click(function() {
    $(this).siblings('.menu').addClass('open');
  });
  
  $('.close-btn').click(function() {
    $('.menu').removeClass('open');  
  });
});