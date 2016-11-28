<?php
  $name = $_POST['name'];
  $address= $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
//  print_r(get_defined_vars());

  $location_data = file_get_contents('locations.json');
  $location_array = json_decode($location_data, true);
//  print_r($location_array);

  $location_count = count($location_array) + 1;
  $key = "location".$location_count;
//  echo $key;

  $id = end($location_array)['id'];
  $id = str_pad(++$id, 4, "0", STR_PAD_LEFT);
//  echo $id;

  $add_location = array(
    "id" => $id,
    "name" => $name,
    "address" => $address,
    "city" => $city,
    "state" => $state,
    "zip" => $zip
  );

  $location_array[$key] = $add_location;
//  print_r($location_array);

  $json_data = json_encode($location_array);
  file_put_contents('locations.json', $json_data);
?>