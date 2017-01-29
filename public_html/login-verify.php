<?php
require("../includes/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$url = "http://www.robcardy.com/api/member/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);


$data = json_decode($data, true);
foreach($data as $val) {
    if (strcmp($val['username'], $username) == 0) {
        if (password_verify($password, $val['hash'])) {
            session_start();
            $_SESSION['user'] = $val['id'];
            $value['title'] = "Member Area";
            render("../templates/member-view.php", $value, __FILE__);
        }
    }
}
