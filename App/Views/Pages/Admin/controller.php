<?php

use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;


Session::start();

Page::runAuth(
    [
        "room-registration",
        "staff-registration",
        "view-rooms",
        "staff-home",
    ],
    "STAFF_ACCOUNT_ACCESS",
    "STAFF_USER_AUTH",
    "staff-login"
);


require_once(Url::getPath("app/views/includes/components/renders/renders.php"));


runStaffPageSetUp();

?>