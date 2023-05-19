<?php

use Views\Includes\Components\Classes\Section;


/**
 * Section setup defaults
 * @param Section $section
 * @return void
 */
function sectionSetupDefaults(Section $section)
{
    $section->setSectionClasses("container-fluid mt-lg");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}


/**
 * Registration form section setup defaults
 * @param Section $section
 * @return void
 */
function registrationFormSectionSetupDefaults(Section $section)
{
    $section->setRowSizing("mt-3");
    $section->setRows(["form-description", "form-body"]);
    $section->setCols([
        "form-description" => "col-md-6 my-5",
        "form-body" => "col-md-5 my-5"
    ]);
}

/**
 * Login form section setup defaults
 * @param Section $section
 * @return void
 */
function loginFormSectionSetupDefaults(Section $section)
{
    $section->setRowSizing("mt-3");
    $section->setRows(["form-description", "form-body"]);
    $section->setCols([
        "form-description" => "col-md-7 my-5",
        "form-body" => "col-md-4 my-5 mx-5"
    ]);
}

/**
 * Staff registration form section setup
 * @return void
 */
function runStaffRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runStaffRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runStaffRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Staff login form section setup
 * @return void
 */
function runStaffLoginFormSectionSetup()
{
    $section = new Section;
    loginFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runStaffLoginFormDescriptionSetup"
        ],
        "form-body" => [
            "runStaffLoginFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Client registration form section setup
 * @return void
 */
function runClientRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runClientRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runClientRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Client login form section setup
 * @return void
 */
function runClientLoginFormSectionSetup()
{
    $section = new Section;
    loginFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runClientLoginFormDescriptionSetup"
        ],
        "form-body" => [
            "runClientLoginFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Room registration form section setup
 * @return void
 */
function runRoomRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runRoomRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runRoomRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}


/**
 * Staff view rooms section setup
 * @return void
 */
function runStaffViewRoomsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runViewRoomsHeaderSetup"
        ],
        "views-body" => [
            "runStaffViewRoomsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Staff homepage setup
 * @return void
 */
function runStaffHomepageSetup()
{
    $section = new Section;

    $section->setRows([
        "home-header",
        "home-body"
    ]);
    $section->setRowSizing([
        "home-header" => "",
        "home-body" => "mx-1 mt-3",
    ]);
    $section->setContent([
        "home-header" => [
            "runStaffHomePageHeaderSetup"
        ],
        "home-body" => [
            "runStaffHomepageBodySetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setType("multi-rows");
    $section->runSetup();
}

/**
 * Client booking form setup
 * @return void
 */
function runClientBookingFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runClientBookingFormDescriptionSetup",
        ],
        "form-body" => [
            "runClientBookingFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}


/**
 * Staff view rooms section setup
 * @return void
 */
function runClientViewBookingsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runClientViewBookingsHeaderSetup"
        ],
        "views-body" => [
            "runClientViewBookings"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}


/**
 * Staff view rooms section setup
 * @return void
 */
function runClientPaymentsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runClientPaymentsHeaderSetup"
        ],
        "views-body" => [
            "runClientPaymentsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}


function runClientDiscountsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runClientDiscountsHeaderSetup"
        ],
        "views-body" => [
            "runClientDiscountSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * client payment form section setup
 * @return void
 */
function runClientPaymentFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runClientPaymentFormDescriptionSetup",
        ],
        "form-body" => [
            "runDiscountAlertSetup",
            "runClientPaymentFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

function runStaffViewPaymentsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runStaffViewPaymentsHeaderSetup"
        ],
        "views-body" => [
            "runStaffViewPaymentsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}


function runStaffViewBookingsSectionSetup()
{
    $section = new Section;

    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runStaffViewBookingsHeaderSetup"
        ],
        "views-body" => [
            "runStaffViewBookingsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}