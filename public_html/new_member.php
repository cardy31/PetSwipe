<?php

$newMemberData = array();

$newMemberData['Firstname'] = $_GET['first'];
$newMemberData['Lastname'] = $_GET['last'];
$newMemberData['Username'] = $_GET['username'];
$newMemberData['Hash'] = crypt($_GET['password']);
$newMemberData['Email'] = $_GET['email'];
$newMemberData['Age'] = $_GET['age'];
$newMemberData['Address'] = $_GET['address'];
$newMemberData['Prov'] = $_GET['province'];
$newMemberData['Postal'] = $_GET['postal'];
$newMemberData['AnimalToAdopt'] = $_GET['pet'];

$json = json_encode($newMemberData);

$url = 'http://www.robcardy.com/api/member/';

$ch = curl_init($url);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// Have cURL follow redirects
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "default:password123");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//Execute the request
$result = curl_exec($ch);
echo $result;

