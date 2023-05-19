<?php

use Models\Core\App\Database\Queries\Read\Client;
use Models\Core\App\Database\Queries\Read\Rooms;
use Models\Core\App\Database\Queries\Read\Staff;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Header;
use Views\Includes\Components\Classes\Page;

function runViewRoomsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/house.png"));
    $header->setHeading("Rooms");
    $header->setItemCountHeading("Total number of rooms");
    $rooms = new Rooms;
    if (is_array($rooms->getRooms())) {
        $header->setItemCount(count($rooms->getRooms()));
    }
    $header->setType("views-header");
    $header->runSetup();
}


function runStaffHomePageHeaderSetup()
{
    $header = new Header;
    $header->setHeading("Hi " . Session::get("st_username") . ",");
    $header->setWelcomeText("Welcome to the administrators dashboard.");
    $header->setDate("Today is " . DateTime::date());
    $header->setLoginInfo("<span class='text-muted'>Last logged in:</span> " . DateTime::dateTime());
    $header->setItemCountHeading("<span class='text-muted'>Total number of tables</span>");
    $header->setItemCount("12");
    $header->setType("profile-header");
    $header->runSetup();
}


function runStaffViewPaymentsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("Client Payments");
    $header->setItemCountHeading("Total payments");
    if (is_array(Staff::run()->getPayments())) {
        $header->setItemCount(count(Staff::run()->getPayments()));
    }
    $header->setType("views-header");
    $header->runSetup();
}


function runStaffViewBookingsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("Client Bookings");
    $header->setItemCountHeading("Total bookings");
    if (is_array(Staff::run()->getBookings())) {
        $header->setItemCount(count(Staff::run()->getBookings()));
    }
    $header->setType("views-header");
    $header->runSetup();
}


function runClientViewBookingsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/phone.png"));
    $header->setHeading("My bookings");
    $header->setItemCountHeading("Total bookings");
    if (is_array(Client::run()->getClientBookingDetails())) {
        $header->setItemCount(count(Client::run()->getClientBookingDetails()));
    }
    $header->setHasButton(true);
    $header->setButtonContent([
        "Active bookings",
        "Complete bookings"
    ]);
    $header->setButtonContentLinks([
        "Active bookings" => "client-bookings?bkstatus=active",
        "Complete bookings" => "client-bookings?bkstatus=complete"
    ]);
    $header->setButtonContentClasses([
        "Active bookings" => "btn btn-primary text-nowrap me-3",
        "Complete bookings" => "btn btn-secondary text-nowrap"
    ]);
    $header->setType("views-header");
    $header->runSetup();
}

function runClientPaymentsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("My Payments");
    $header->setItemCountHeading("Total payments");
    if (is_array(Client::run()->getClientPayments())) {
        $header->setItemCount(count(Client::run()->getClientPayments()));
    }
    $header->setHasButton(true);
    $header->setButtonContent([
        "Pending payments",
        "Complete payments"
    ]);
    $header->setButtonContentLinks([
        "Pending payments" => "client-payments?pmstatus=pending",
        "Complete payments" => "client-payments?pmstatus=verified"
    ]);
    $header->setButtonContentClasses([
        "Pending payments" => "btn btn-primary text-nowrap me-3",
        "Complete payments" => "btn btn-secondary text-nowrap"
    ]);
    $header->setType("views-header");
    $header->runSetup();
}

function runClientDiscountsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/payment-method.png"));
    $header->setHeading("My Discounts");
    $header->setItemCountHeading("Total discounts");
    if (is_array(Client::run()->getClientPayments())) {
        $header->setItemCount(count(Client::run()->getClientPayments()));
    }
    $header->setHasButton(true);
    $header->setButtonContent([
        "Active discounts",
        "Used discounts"
    ]);
    $header->setButtonContentLinks([
        "Active discounts" => "client-discounts?dstatus=active",
        "Used discounts" => "client-discounts?dstatus=used"
    ]);
    $header->setButtonContentClasses([
        "Active discounts" => "btn btn-primary text-nowrap me-3",
        "Used discounts" => "btn btn-secondary text-nowrap"
    ]);
    $header->setType("views-header");
    $header->runSetup();
}