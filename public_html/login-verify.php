<?php

$username = $_GET['username'];

$url = "http://www.robcardy.com/api/member/";

$url = "https://www.robcardy.com/api/member/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);





//session_start();
//$_SESSION['user'] = 1;