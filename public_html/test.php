<?php

$secret ="3b01189e7d22ef5343b93af919a2a592";
$public= "e540e02b94af2ffb8a82381b03e11654";
$animal= "dog"; // can be set via choice
$output= "full"; //sets information gathered to all
$location= "10118"; //empire state building location as default
// creates the signature for accessing the api
$code = md5($public . "key=" . $secret . "&location=10118&animal=" . $animal . "&output=" . $output );
// final processed line used to access the api
$url = "http://api.petfinder.com/pet.getRandom?key=" . $public . "&location=10118&output=full&sig=" . $code;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-app-id:2979e4bf',
    'x-app-key:4490437c2ebd3cb737a7bb8996c40ade',
    'x-remote-user-id:0'
));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

$name = $decoded['petfinder']['pet']['options']['status']['\$t'];
print_r($name);
