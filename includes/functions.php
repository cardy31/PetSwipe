<?php
// Properly renders pages with header and footer
function render($template, $values) {
    if (file_exists("../templates/$template")) {
        if ($values != NULL){
            extract($values);
        }
        require("../templates/header.php");

        require("../templates/$template");

        require("../templates/footer.php");
    }
    else {
        trigger_error("Template does not exist.", E_USER_ERROR);
    }
}
//
//$exempt_urls = ["login.php", "index.php", "signup.php", "new_member.php"];
//if (isset($_SESSION['user']) && in_array(__FILE__, $exempt_urls)) {
//
//} else {
//    $values['title'] = "Login";
//    render("login-form.php", $values);
//}