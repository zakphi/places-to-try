$('.menu-btn').click(function() {
  $('.menu').addClass('open');
});

$('.close-btn').click(function() {
  $('.menu').removeClass('open');
});

$('#add_location').submit( function(e){
  var formData = new FormData($(this)[0]);
  var form = $('#add_location');
  $.ajax({
    // url:"ajaxprocess.php",
    // type:"post",
    url:form.attr('action'),
    type:form.attr('method'),
    data:formData,
    async:false,
    success:function(){
      var name = $('#loc_name').val();
      $('#added').html(name+" was added");
    },
    cache:false,
    contentType:false,
    processData:false
  });
  e.preventDefault();
  $('#add_location')[0].reset();
  $('#submit-buttons #done').show();
  $('#submit-buttons #add').hide();
});

$('#done').click(function(){
  window.location.href = 'map.php';
});

$('#submit-buttons #add').hide();
$("#loc_name").keyup(function(){
   $('#submit-buttons #add').show();
   $('#submit-buttons #done').hide();
   var location_name = $('#loc_name').val();
   if(location_name == ""){
    $('#submit-buttons #done').show();
    $('#submit-buttons #add').hide();
   }
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

if( $('body').hasClass('map') ){
  $('.view-btns').css('display','block');
  var script_tag = document.createElement('script');
  script_tag.async = true;
  script_tag.defer = true;
  var api_key = 'AIzaSyBjf0uAhv8nPnIC2v245aqnO7pVwCJuZTs';
  script_tag.src = 'https://maps.googleapis.com/maps/api/js?key='+api_key+'&callback=init';
  $('body').append(script_tag);
}