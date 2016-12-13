<?php
  session_start();
  $name = $_POST['name'];
  $address= $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $location = $address.', '.$city.', '.$state.', '.$zip;
//  echo $location;
//  print_r(get_defined_vars());

  $json_file = 'data/'.$_SESSION['name'].'_'.$_SESSION['uid'].'.json';

// lines 10-26 came from https://www.codeofaninja.com/2014/06/google-maps-geocoding-example-php.html
  $address = urlencode($address);
//  echo $address;

  $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
  $address = str_replace("+"," ",$address);
//  echo $address;
//  echo $url;

  $resp_json = file_get_contents($url);
//  echo $resp_json;

  $resp = json_decode($resp_json, true);
//  echo $resp;

  if($resp['status'] == 'OK'){
    $lat = $resp['results'][0]['geometry']['location']['lat'];
    $lng = $resp['results'][0]['geometry']['location']['lng'];
//    echo "lat: $lat";
//    echo "lng: $lng";
  }

  $locations_data = file_get_contents($json_file);
  $locations_array = json_decode($locations_data, true);
//  print_r($location_array);

  $locations_count = count($locations_array) + 1;
  $key = "location".$locations_count;
//  echo $key;

  $id = end($locations_array)['id'];
  $id = str_pad(++$id, 4, "0", STR_PAD_LEFT);
//  echo $id;

  // $add_location = array(
  //   "id" => $id,
  //   "name" => $name,
  //   "address" => $address,
  //   "city" => $city,
  //   "state" => $state,
  //   "zip" => $zip,
  //   "lat" => $lat,
  //   "lng" => $lng
  // );
  $add_location = array(
    "id" => $id,
    "name" => $name,
    "location" => $location,
    "lat" => $lat,
    "lng" => $lng
  );

  $locations_array[$key] = $add_location;
//  print_r($location_array);

  $json_data = json_encode($locations_array);
  file_put_contents($json_file, $json_data);
?>