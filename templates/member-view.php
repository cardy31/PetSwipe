<?php

function get_pet($id) {
    $secret ="3b01189e7d22ef5343b93af919a2a592";
    $public= "e540e02b94af2ffb8a82381b03e11654";
    $animal= "dog"; // can be set via choice
    $output= "full"; //sets information gathered to all
    $location= "10118"; //empire state building location as default
    // creates the signature for accessing the api
    $code = md5($secret . "key=" . $public . "&id= " .  $id . "&format=json" );
    // final processed line used to access the api
    $url = "http://api.petfinder.com/pet.get?key=" . $public . "&id="  .$id . "&format=json&sig=" . $code;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function get_swiped_pets() {
    
}

$decoded = json_decode($data, true);
$url = $decoded['petfinder']['pet']['id']['$t'];
print_r($url);