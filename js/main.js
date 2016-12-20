$('.menu-btn').click(function() {
  $('.menu').addClass('open');
});

$('.close-btn').click(function() {
  $('.menu').removeClass('open');
});

// // $('#add').click(function(){
//   // console.log('add another button clicked');
//   $('#add_location').submit( function(e){
//     var formData = new FormData($(this)[0]);
//     $.ajax({
//       url:"ajaxprocess.php",
//       type:"post",
//       data:formData,
//       async:false,
//       success:function(msg){
//         var name = $('input[name="name"]').val();
//         $('#added').html(name+" was added");
//       },
//       cache:false,
//       contentType:false,
//       processData:false
//     });
//     e.preventDefault();
//     $('#add_location')[0].reset();
//   });
// // });

// $('#done').click(function(){
//   $("#add").click();
//   window.location.href = 'map.php';
//   // console.log('save and finish button clicked');
//   // $('#add_location').submit( function(e){
//   //   var formData = new FormData($(this)[0]);
//   //   $.ajax({
//   //     url:"ajaxprocess.php",
//   //     type:"post",
//   //     data:formData,
//   //     async:false,
//   //     success:function(msg){
//   //       window.location.href = 'map.php';
//   //     },
//   //     cache:false,
//   //     contentType:false,
//   //     processData:false
//   //   });
//   // });
// });

function add_location(){
  $('#add_location').submit( function(e){
    var formData = new FormData($(this)[0]);
    $.ajax({
      url:"ajaxprocess.php",
      type:"post",
      data:formData,
      async:false,
      success:function(){
        var name = $('input[name="name"]').val();
        $('#added').html(name+" was added");
      },
      cache:false,
      contentType:false,
      processData:false
    });
    e.preventDefault();
    $('#add_location')[0].reset();
  });
}

$('#add').click(function(){
  add_location();
});

$('#done').click(function(){
  add_location();
  window.location.href = 'map.php';
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
  var a = document.createElement('script');
  a.async = true;
  a.defer = true;
  var api_key = 'AIzaSyBjf0uAhv8nPnIC2v245aqnO7pVwCJuZTs';
  a.src = 'https://maps.googleapis.com/maps/api/js?key='+api_key+'&callback=init';
  $('body').append(a);
}

/*
var lorem = new Lorem;
lorem.type = Lorem.TEXT;
lorem.query = '1w';
var blah = lorem.createLorem(document.getElementById('lorem'));
$(".test-li").val(blah);
$("#test-li-email").val(blah+"@gmail.com");
*/