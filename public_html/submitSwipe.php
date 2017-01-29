<?php

require("../includes/config.php");


$newSwipe = array();
$newSwipe['animalCode'] = $_POST['animalCode'];
$newSwipe['member'] = $_SESSION['USER'];

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


$values["title"] = "Swipe";
render("../templates/swipe-view.php", $values, __FILE__);




