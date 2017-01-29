<?php
require("../includes/config.php");

$secret ="3b01189e7d22ef5343b93af919a2a592";
$public= "e540e02b94af2ffb8a82381b03e11654";
$animal= "dog"; // can be set via choice
$output= "full"; //sets information gathered to all
$location= "10118"; //empire state building location as default
// creates the signature for accessing the api
$code = md5($secret . "key=" . $public . "&location=10118&animal=" . $animal . "&output=" . $output . "&format=json" );
// final processed line used to access the api
$url = "http://api.petfinder.com/pet.getRandom?key=" . $public . "&location=10118&animal=" . $animal . "&output=full&format=json&sig=" . $code;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

$decoded = json_decode($data, true);
$url = $decoded['petfinder']['pet']['media']['photos']['photo'][0]['$t'];
$url = strtok($url, '?');
print_r($url);