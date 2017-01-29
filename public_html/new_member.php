<?php

$newMemberData = array();

var_dump($_POST);

$newMemberData['firstname'] = $_POST['first'];
$newMemberData['lastname'] = $_POST['last'];
$newMemberData['email'] = $_POST['email'];
$newMemberData['username'] = $_POST['username'];
$newMemberData['hash'] = crypt($_POST['password']);
$newMemberData['age'] = $_POST['age'];
$newMemberData['address'] = $_POST['address'];
$newMemberData['prov'] = $_POST['province'];
$newMemberData['postal'] = $_POST['postal'];
$newMemberData['animalToAdopt'] = $_POST['pet'];
$newMemberData['adoptWithMedical'] = True;
$newMemberData['previousOwnership'] = True;

$json = json_encode($newMemberData);

$url = 'http://www.robcardy.com/api/member/';


$ch2 = curl_init($url);
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $newMemberData);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch2);
curl_close($ch2);

var_dump($data);
print_r(json_decode($data, true));

