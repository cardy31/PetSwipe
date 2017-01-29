<?php
// Properly renders pages with header and footer
function render($template, $values, $filename) {
//    $exempt_urls = ["login.php", "index.php", "signup.php", "new_member.php", "login-verify.php"];
//    // Catch if the user is trying to access a page they need to be logged in for
//    if (!isset($_SESSION['user']) && !in_array($filename, $exempt_urls)) {
//        echo "Not Logged In";
//        echo $filename;
//        $values['title'] = "Login";
//        $values['message'] = "Sorry, you have to login to view that page.";
//
//    }
//    else {
//        echo "RENDER";
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
//    }
}