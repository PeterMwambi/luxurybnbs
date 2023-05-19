<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Card;


function formSetupDefaults(Card $card)
{
    $card->setCardSizing("my-5");
    $card->setCardBodySizing("p-4");
    $card->setType("default");
    $card->runSetup();
}

function runStaffRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runStaffRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runStaffRegistrationFormSetupStep2", "runStaffRegistrationFormSetupStep1"]);
    formSetupDefaults($card);
}

function runStaffLoginFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runStaffLoginFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runStaffLoginFormSetup"]);
    formSetupDefaults($card);
}

function runClientRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runClientRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runClientRegistrationFormSetupStep2", "runClientRegistrationFormSetupStep1"]);
    formSetupDefaults($card);
}

function runClientLoginFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runClientLoginFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runClientLoginFormSetup"]);
    formSetupDefaults($card);
}

function runRoomRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runRoomRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runRoomRegistrationFormSetupStep1", "runRoomRegistrationFormSetupStep2"]);
    formSetupDefaults($card);
}

function runStaffHomepageBodySetup()
{
    $card = new Card;
    $card->setProfileCardItems([
        "Clients",
        "Staff",
        "Guests",
        "Rooms",
        "Bookings",
        "Payments"
    ]);
    $card->setProfileCardIcons([
        "Guests" => Url::getReference("resources/assets/images/png/team.png"),
        "View guests" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "Clients" => Url::getReference("resources/assets/images/png/user.png"),
        "View clients" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "Staff" => Url::getReference("resources/assets/images/png/meeting.png"),
        "View staff" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "Add staff" => Url::getReference("resources/assets/images/png/add.png"),
        "Rooms" => Url::getReference("resources/assets/images/png/house.png"),
        "View rooms" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "Add room" => Url::getReference("resources/assets/images/png/add.png"),
        "Bookings" => Url::getReference("resources/assets/images/png/payment-method.png"),
        "View bookings" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "Payments" => Url::getReference("resources/assets/images/png/dollar.png"),
        "View payments" => Url::getReference("resources/assets/images/png/open-folder.png"),
        "View discounts" => Url::getReference("resources/assets/images/png/open-folder.png")
    ]);
    $card->setProfileCardParagraphs([
        "Guests" => "Consist of clients who have booked, checked in or checked out of rooms",
        "Clients" => "Consist of clients with user accounts",
        "Staff" => "Consist of staff members working for the company",
        "Rooms" => "Consist of all rooms, registered and viewable for display",
        "Bookings" => "Consists of all active, complete, and cancelled bookings made by clients",
        "Payments" => "Consist of all payments made and discounts received by clients",
    ]);
    $card->setProfileCardButtons([
        "Guests" => [
            "View guests",
        ],
        "Clients" => [
            "View clients"
        ],
        "Staff" => [
            "View staff",
            "Add staff"
        ],
        "Rooms" => [
            "View rooms",
            "Add room",
        ],
        "Bookings" => [
            "View bookings"
        ],
        "Payments" => [
            "View payments",
            "View discounts"
        ]
    ]);
    $card->setProfileCardButtonProperties([
        "View guests" => "btn btn-primary",
        "View clients" => "btn btn-primary",
        "View staff" => "btn btn-primary me-2",
        "Add staff" => "btn btn-secondary me-2",
        "View rooms" => "btn btn-primary me-2",
        "Add room" => "btn btn-secondary me-2",
        "View bookings" => "btn btn-primary",
        "View payments" => "btn btn-primary me-2",
        "View discounts" => "btn btn-primary"
    ]);
    $card->setProfileCardButtonLinks([
        "View guests" => "#",
        "View clients" => "#",
        "View staff" => "#",
        "Add staff" => "staff-registration",
        "View rooms" => "view-rooms",
        "Add room" => "room-registration",
        "View bookings" => "view-bookings",
        "View payments" => "view-payments",
        "View discounts" => "#"
    ]);
    $card->setItemCountHeading("Total number of records");
    $card->setItemCount(12);
    $card->setType("profile-card");
    $card->runSetup();
}


function runClientBookingFormCardSetup()
{
    $card = new Card;
    $card->setCardBodyContent(["runClientBookingFormHeaderSetup", "runSpinnerSetup", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runClientBookingFormSetup"]);
    formSetupDefaults($card);
}

function runClientPaymentFormCardSetup()
{
    $card = new Card;
    $card->setCardBodyContent(["runClientPaymentFormHeaderSetup", "runSpinnerSetup", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runClientPaymentFormSetup"]);
    formSetupDefaults($card);
}