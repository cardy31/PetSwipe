<?php

$url = "http://www.robcardy.com/api/member/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
$data = json_decode($data, true);
print_r($data);
echo "<br><br>";


print_r($data[0]);

echo "<br><br>";

foreach($data as $val) {
    print_r($val);
    echo "<br><br>";
}