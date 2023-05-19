<?php

use Models\Core\App\Utilities\Session;
use Views\Includes\Components\Classes\Page;


/**
 * Page setup defaults
 * @param Page $page
 * @return void
 */
function runPageSetupDefaults(Page $page)
{
    $page->setMeta("app/views/includes/meta/head.php");
    $page->setScripts("app/views/includes/meta/scripts.php");
}

/**
 * Cient page setup
 * @return void
 */
function runClientPageSetup()
{
    $page = new Page;
    runPageSetupDefaults($page);
    $page->setSpecialRequests([
        "client-registration",
        "client-login"
    ]);
    $forms = "app/views/includes/containers/client/forms.php";
    $views = "app/views/includes/containers/client/views.php";
    $page->setPages([
        "home" => $views,
        "client-login" => $forms,
        "client-registration" => $forms,
        "client-booking" => $forms,
        "client-bookings" => $views,
        "client-payment" => $forms,
        "client-payments" => $views,
        "client-discounts" => $views
    ]);
    $page->setAction("page");
    $page->runSetup();
}

/**
 * Staff page setup
 * @return void
 */
function runStaffPageSetup()
{
    $page = new Page;
    runPageSetupDefaults($page);
    $page->setSpecialRequests([
        "staff-registration",
        "staff-login",
        "room-registration"
    ]);
    $views = "app/views/includes/containers/admin/views.php";
    $forms = "app/views/includes/containers/admin/forms.php";
    $page->setPages([
        "home" => "app/views/includes/containers/client/header.php",
        "staff-login" => $forms,
        "staff-registration" => $forms,
        "room-registration" => $forms,
        "view-rooms" => $views,
        "staff-home" => $views,
        "view-bookings" => $views,
        "view-payments" => $views
    ]);
    $page->setAction("page");
    $page->runSetup();
}


/**
 * Staff form handler
 * @return void
 */
function runStaffFormHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "staff-registration" => "runStaffRegistrationFormSectionSetup",
        "staff-login" => "runStaffLoginFormSectionSetup",
        "room-registration" => "runRoomRegistrationFormSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/**
 * Client form handler
 * @return void
 */
function runClientFormHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "client-registration" => "runClientRegistrationFormSectionSetup",
        "client-login" => "runClientLoginFormSectionSetup",
        "client-booking" => "runClientBookingFormSectionSetup",
        "client-payment" => "runClientPaymentFormSectionSetup",
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/**
 * staff views handler
 * @return void
 */
function runStaffViewsHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "view-rooms" => "runStaffViewRoomsSectionSetup",
        "staff-home" => "runStaffHomepageSetup",
        "view-bookings" => "runStaffViewBookingsSectionSetup",
        "view-payments" => "runStaffViewPaymentsSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/**
 * staff views handler
 * @return void
 */
function runClientViewsHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "client-discounts" => "runClientDiscountsSectionSetup",
        "client-payments" => "runClientPaymentsSectionSetup",
        "client-bookings" => "runClientViewBookingsSectionSetup",
        "home" => "runClientHeaderCarouselSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}