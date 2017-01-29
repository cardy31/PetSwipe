<?php
require("../includes/config.php");

$values["title"] = "Home";
render("../templates/member-view.php", $values, __FILE__);