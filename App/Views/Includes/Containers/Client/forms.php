<?php

use Models\Core\App\Cache\Storage;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));
Storage::clearCache();

if (Session::exists(("CLIENT_BOOKING_ROOM_ID")) && !Session::exists("CLIENT_ACCOUNT_ACCESS") && Page::run()->getRequest() === "client-login") {
    runBookingAlertSetUp();
}

runClientNavbarSetUp(Page::run()->getTitle());

runClientFormHandler();
?>