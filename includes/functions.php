<?php
// Properly renders pages with header and footer
function render($template) {
    if (file_exists("../templates/$template")) {
//        extract($values);

        require("../templates/header.php");

        require("../templates/$template");

        require("../templates/footer.php");
    }
    else {
        trigger_error("Template does not exist.", E_USER_ERROR);
    }
}
