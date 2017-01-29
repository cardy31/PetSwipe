<?php
require("../includes/config.php");
$values["title"] = "Logout";

$_SESSION['user'] = null;

render("../templates/logout-view.php", $values, __FILE__);

