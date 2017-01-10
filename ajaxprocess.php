<?php
  session_start();
  $name = $_POST['name'];
  $address= $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $location = $address.', '.$city.', '.$state.', '.$zip;

  $json_file = 'data/'.$_SESSION['un'].'_'.$_SESSION['uid'].'.json';

//  lines 13 - 25 came from https://www.codeofaninja.com/2014/06/google-maps-geocoding-example-php.html
  $address = urlencode($address);

  $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
  $address = str_replace("+"," ",$address);

  $resp_json = file_get_contents($url);

  $resp = json_decode($resp_json, true);

  if($resp['status'] == 'OK'){
    $lat = $resp['results'][0]['geometry']['location']['lat'];
    $lng = $resp['results'][0]['geometry']['location']['lng'];
  }

  $locations_data = file_get_contents($json_file);
  $locations_array = json_decode($locations_data, true);

  $locations_count = count($locations_array) + 1;
  $key = "location".$locations_count;

  $id = end($locations_array)['id'];
  $id = str_pad(++$id, 4, "0", STR_PAD_LEFT);

  $add_location = array(
    "id" => $id,
    "name" => $name,
    "location" => $location,
    "lat" => $lat,
    "lng" => $lng
  );

  $locations_array[$key] = $add_location;

  $json_data = json_encode($locations_array);
  file_put_contents($json_file, $json_data);
?>