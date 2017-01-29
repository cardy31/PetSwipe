<?php
/**
 * Created by PhpStorm.
 * User: hannahgreer
 * Date: 2017-01-28
 * Time: 11:42 PM
 */

$newSwipe = array();
$newSwipe['AnimalCode'] = $_POST['AnimalCode'];
$newSwipe['Member'] = $_SESSION['USER'];

/*
echo "Hello!";
 $_POST['accept'];
*/



$json = json_encode($newSwipe);

$url = 'http://robcardy.com/api/swipedanimal/';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERPWD, "default" . ":" . "password123");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $newSwipe);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

var_dump($data);
print_r(json_decode($data, true));