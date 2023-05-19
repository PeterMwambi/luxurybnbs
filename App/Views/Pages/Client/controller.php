<?php

use Models\Auth\Input;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;


require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

Session::start();

if (Input::get("roomid")) {
    Session::set("CLIENT_BOOKING_ROOM_ID", Input::get("roomid"));
}

if (Input::get("bookingid")) {
    Session::set("CLIENT_PAYMENT_BOOKING_ID", Input::get("bookingid"));
}

if (Input::get("did")) {
    Session::set("CLIENT_DISCOUNT_ID", Input::get("did"));
}

if (Input::get("paymentid")) {
    Session::set("CLIENT_FULL_PAYMENT", Input::get("paymentid"));
}

if (Input::get("dstatus")) {
    Session::set("CLIENT_DISCOUNT_STATUS", Input::get("dstatus"));
}

if (Input::get("bkstatus")) {
    Session::set("CLIENT_BOOKING_STATUS", Input::get("bkstatus"));
}
if (Input::get("pmstatus")) {
    Session::set("CLIENT_PAYMENT_STATUS", Input::get("pmstatus"));
}


Page::runAuth(
    [
        "client-booking"
    ],
    "CLIENT_ACCOUNT_ACCESS",
    "CLIENT_USER_AUTH",
    "client-login"
);


runClientPageSetUp();


?>