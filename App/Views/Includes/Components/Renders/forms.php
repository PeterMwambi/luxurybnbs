<?php

use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Forms\Form;
use Views\Includes\Components\Forms\FormDescription;
use Views\Includes\Components\Classes\Header as FormHeader;



/*
````````````````````````````````````````````````````````
DEFAULT PROPERTIES
```````````````````````````````````````````````````````
*/


/**
 * Form description setup defaults
 * @param FormDescription $formDescription
 * @return void
 */
function formDescriptionSetupDefaults(FormDescription $formDescription)
{
    $formDescription->setJustifyHeading("center");
    $formDescription->setHeadingColor("primary");
    $formDescription->setJustifyDescription("center");
    $formDescription->setDescriptionColor("dark");
    $formDescription->setDescriptionColumns("col-md-6 col-9");
    $formDescription->setJustifyDescriptionImage("center");
    $formDescription->setDescriptionSizing("my-3");
    $formDescription->setDescriptionTextJustify("center");
    $formDescription->setDescriptionImageUrlClasses("img-fluid");
    $formDescription->runSetup();
}


/**
 * form header set up default properties
 * @param FormHeader $formHeader
 * @return void
 */
function formHeaderSetupDefaults(FormHeader $formHeader)
{
    $formHeader->setHelpTextClasses("luxurybnbs__help-text");
    $formHeader->setHeadingClasses("luxurybnbs__form-heading");
    $formHeader->setHelpTextSizing("mb-3");
    $formHeader->setHeadingSizing("mt-3");
    $formHeader->setJustifyHeading("center");
    $formHeader->setJustifyHelpText("center");
    $formHeader->setType("form-header");
    $formHeader->runSetup();
}


/* 
```````````````````````````````````````````````````````
ADMIN FORMS SET UP
``````````````````````````````````````````````````````
*/

/*
``````````````````````````````````````````````````````
STAFF REGISTRATION FORM
`````````````````````````````````````````````````````
*/

/**
 * Staff registration form description setup
 * @return void
 */
function runStaffRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Staff registration form");
    $formDescription->setDescription("Please ensure that you fill all the required
        fields to
        register a
        new staff
        member");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/meeting.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Staff registration form header set up
 * @return void
 */
function runStaffRegistrationFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Personal Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}
/**
 * Staff registration form set up step 1
 * @return void
 */
function runStaffRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "firstname",
        "lastname",
        "gender",
        "date-of-birth",
        "age",
        "nationality",
        "national-id",
        "phone-number",
        "email",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);
    $form->setRows(1);
    $form->setCols([
        "firstname" => "col-12 col-md-6 my-2",
        "lastname" => "col-12 col-md-6 my-2",
        "gender" => "col-12 col-md-6 my-2",
        "date-of-birth" => "col-12 col-md-6 my-2",
        "age" => "col-12 col-md-6 my-2",
        "nationality" => "col-12 col-md-6 my-2",
        "national-id" => "col-12 col-md-6 my-2",
        "phone-number" => "col-12 col-md-6 my-2",
        "email" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12",
        "additional-buttons" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "firstname" => array(
            "label" => [
                "for" => "firstname",
                "value" => "<h6><strong>Firstname: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "firstname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "lastname" => array(
            "label" => [
                "for" => "lastname",
                "value" => "<h6><strong>Lastname: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "lastname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "gender" => array(
            "label" => [
                "for" => "gender",
                "value" => "<h6><strong>Gender: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "gender",
                "options" => ["Male", "Female"],
                "class" => "form-select"
            ]
        ),
        "date-of-birth" => array(
            "label" => [
                "for" => "date-of-birth",
                "value" => "<h6><strong>Date of birth* </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "date-of-birth",
                "class" => "form-control",
                "value" => "",
            ]
        ),
        "age" => array(
            "label" => [
                "for" => "age",
                "value" => "<h6><strong>Age: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "age",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "nationality" => array(
            "label" => [
                "for" => "nationality",
                "value" => "<h6><strong>Nationality: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "nationality",
                "options" => ["Kenyan"],
                "class" => "form-select"
            ]
        ),
        "national-id" => array(
            "label" => [
                "for" => "national-id",
                "value" => "<h6><strong>National id: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "national-id",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "phone-number" => array(
            "label" => [
                "for" => "phone-number",
                "value" => "<h6><strong>Phone Number: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "phone-number",
                "class" => "form-control",
                "value" => "",
                "has-group" => true,
                "group-details" => array("prefix" => "+254")
            ]
        ),
        "email" => array(
            "label" => [
                "for" => "email",
                "value" => "<h6><strong>Email: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "email",
                "name" => "email",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STAFF_REGISTRATION_FORM_STEP_1")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "staff-login",
                "innerHtml" => "I already have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "staff-registration-form-step-1",
        "class" => ""
    ]);
}
/**
 * Staff registration form setup step 2
 * @return void
 */
function runStaffRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setFields([
        "username",
        "role",
        "auth-level",
        "password",
        "confirm-password",
        "show-password",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "username" => "col-12 my-2",
        "password" => "col-12 my-2",
        "confirm-password" => "col-12 my-2",
        "show-password" => "col-12 my-2",
        "auth-level" => "col-12 my-2",
        "role" => "col-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "confirm-password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Confirm Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "confirm-password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "role" => array(
            "label" => [
                "for" => "role",
                "value" => "<h6><strong>Role: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "role",
                "options" => ["Manager", "Cashier"],
                "class" => "form-select"
            ]
        ),
        "auth-level" => array(
            "label" => [
                "for" => "authentication-level",
                "value" => "<h6><strong>Authentication level: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "auth-level",
                "options" => ["Admin", "Guest"],
                "class" => "form-select"
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STAFF_REGISTRATION_FORM_STEP_2")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete Registration &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "staff-registration-form-step-2",
        "class" => "d-none"
    ]);
}

/*
``````````````````````````````````````````````````````````````
STAFF LOGIN FORM
`````````````````````````````````````````````````````````````
*/
/**
 * Staff login form description set up
 * @return void
 */
function runStaffLoginFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Staff login form");
    $formDescription->setDescription("Please ensure that you enter the correct username and password for you to access your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/meeting.png"));
    formDescriptionSetupDefaults($formDescription);
}
/**
 * Staff login form header set up
 * @return void
 */
function runStaffLoginFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Account Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Staff login form setup
 * @return void
 */
function runStaffLoginFormSetup()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "show-password",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "username" => "col-md-12 my-2",
        "password" => "col-md-12 my-2",
        "show-password" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STAFF_LOGIN_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to my account &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "staff-login-form",
        "class" => ""
    ]);
}


/*
````````````````````````````````````````````````````````````
ROOM REGISTRATION
````````````````````````````````````````````````````````````
*/

/**
 * Room Registration form description set up
 * @return void
 */
function runRoomRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Room registration form");
    $formDescription->setDescription("Please ensure that you fill all the required fields to register a new room");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/meeting.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Room registration form header setup
 * @return void
 */
function runRoomRegistrationFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Profile information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Room registration form set up step 1
 * @return void
 */
function runRoomRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "name",
        "type",
        "number",
        "price",
        "status",
        "features",
        "description",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "name" => "col-md-12 col-12 my-2",
        "type" => "col-md-6 col-12 my-2",
        "number" => "col-md-6 col-12 my-2",
        "price" => "col-md-6 col-12 my-2",
        "status" => "col-md-6 col-12 my-2",
        "features" => "col-md-12 col-12",
        "description" => "col-md-12 col-12",
        "form-identifier" => "col-md-12 col-12",
        "submit" => "col-md-12 col-12"
    ]);
    $form->setContent([
        "name" => [
            "label" => [
                "for" => "Room name",
                "value" => "<h6><strong>Room name *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "class" => "form-control",
                "name" => "name",
            ],
        ],
        "type" => [
            "label" => [
                "for" => "Room type",
                "value" => "<h6><strong>Room type *</strong></h6>",
                "class" => "my-2",
            ],
            "select" => [
                "name" => "type",
                "options" => ["Single room", "Double room", "Executive room"],
                "class" => "form-select",
            ],
        ],
        "number" => [
            "label" => [
                "for" => "Room number",
                "value" => "<h6><strong>Room number *</strong></h6>",
                "class" => "my-2",
            ],
            "input" => [
                "type" => "number",
                "name" => "number",
                "class" => "form-control"
            ],
        ],
        "price" => [
            "label" => [
                "for" => "Room price",
                "value" => "<h6><strong>Room price *</strong></h6>",
                "class" => "my-2",
            ],
            "input" => [
                "type" => "number",
                "name" => "price",
                "class" => "form-control"
            ]
        ],
        "status" => [
            "label" => [
                "for" => "Room status",
                "value" => "<h6><strong>Room status *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "status",
                "options" => ["Available", "Booked", "Occupied"],
                "class" => "form-select",
            ],
        ],
        "features" => [
            "label" => [
                "for" => "Room features",
                "value" => "<h6><strong>Room features *</strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "features",
                "class" => "form-control",
                "style" => "height: 90px;"
            ]
        ],
        "description" => [
            "label" => [
                "for" => "Room description",
                "value" => "<h6><strong>Room description *</strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "description",
                "class" => "form-control",
                "style" => "height: 150px;"
            ]
        ],
        "form-identifier" => [
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "value" => Hashing::encrypt("ROOM_REGISTRATION_FORM_STEP_1")
            ]
        ],
        "submit" => [
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ],
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "room-registration-form-step-1",
        "class" => ""
    ]);
}
/**
 * Summary of runRoomRegistrationFormSetupStep2
 * @return void
 */
function runRoomRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setRows(1);
    $form->setFields([
        "room-picture",
        "form-identifier",
        "submit"
    ]);
    $form->setCols([
        "room-picture" => "col-md-12 col-12 my-2",
        "form-identifier" => "col-12 col-md-12",
        "submit" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "room-picture" => [
            "label" => [
                "for" => "room-image",
                "value" => "
                <div class='my-2'>
                    <img src='" . Url::getReference("resources/assets/images/png/add.png") . "' class='img-fluid x-large pointer upload-icon'>
                </div>
                ",
                "class" => "my-2 d-flex justify-content-center",
            ],
            "input" => [
                "type" => "file",
                "name" => "pictures",
                "class" => "d-none",
                "id" => "room-image",
                "onchange" => "readFile(this)"
            ]
        ],
        "form-identifier" => [
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "value" => Hashing::encrypt("ROOM_REGISTRATION_FORM_STEP_2")
            ]
        ],
        "submit" => [
            "button" => [
                "color" => "primary btn-lg",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete setup"
            ]
        ]
    ]);
    $form->runSetup([
        "method" => "post",
        "action" => "",
        "enctype" => "multipart/form-data",
        "class" => "d-none",
        "id" => "room-registration-form-step-2"
    ]);
}

/*
`````````````````````````````````````````````````````````
CLIENT FORMS SET UP 
`````````````````````````````````````````````````````````
*/

/*
`````````````````````````````````````````````````````````
CLIENT REGISTRATION FORM
`````````````````````````````````````````````````````````
*/
/**
 * Client registration form description set up
 * @return void
 */
function runClientRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Client registration form");
    $formDescription->setDescription("Please ensure that you fill all the required
        fields correctly to
        set up your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/worker.png"));
    formDescriptionSetupDefaults($formDescription);
}
/**
 * Client registration form header set up
 * @return void
 */
function runClientRegistrationFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Personal Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Client registration form set up step 1
 * @return void
 */
function runClientRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "firstname",
        "lastname",
        "gender",
        "date-of-birth",
        "age",
        "nationality",
        "national-id",
        "phone-number",
        "email",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);
    $form->setRows(1);
    $form->setCols([
        "firstname" => "col-12 col-md-6 my-2",
        "lastname" => "col-12 col-md-6 my-2",
        "gender" => "col-12 col-md-6 my-2",
        "date-of-birth" => "col-12 col-md-6 my-2",
        "age" => "col-12 col-md-6 my-2",
        "nationality" => "col-12 col-md-6 my-2",
        "national-id" => "col-12 col-md-6 my-2",
        "phone-number" => "col-12 col-md-6 my-2",
        "email" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12",
        "additional-buttons" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "firstname" => array(
            "label" => [
                "for" => "firstname",
                "value" => "<h6><strong>Firstname: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "firstname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "lastname" => array(
            "label" => [
                "for" => "lastname",
                "value" => "<h6><strong>Lastname: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "lastname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "gender" => array(
            "label" => [
                "for" => "gender",
                "value" => "<h6><strong>Gender: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "gender",
                "options" => ["Male", "Female"],
                "class" => "form-select"
            ]
        ),
        "date-of-birth" => array(
            "label" => [
                "for" => "date-of-birth",
                "value" => "<h6><strong>Date of birth* </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "date-of-birth",
                "class" => "form-control",
                "value" => "",
            ]
        ),
        "age" => array(
            "label" => [
                "for" => "age",
                "value" => "<h6><strong>Age: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "age",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "nationality" => array(
            "label" => [
                "for" => "nationality",
                "value" => "<h6><strong>Nationality: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "nationality",
                "options" => ["Kenyan"],
                "class" => "form-select"
            ]
        ),
        "national-id" => array(
            "label" => [
                "for" => "national-id",
                "value" => "<h6><strong>National id: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "national-id",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "phone-number" => array(
            "label" => [
                "for" => "phone-number",
                "value" => "<h6><strong>Phone Number: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "phone-number",
                "class" => "form-control",
                "value" => "",
                "has-group" => true,
                "group-details" => array("prefix" => "+254")
            ]
        ),
        "email" => array(
            "label" => [
                "for" => "email",
                "value" => "<h6><strong>Email: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "email",
                "name" => "email",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("CLIENT_REGISTRATION_FORM_STEP_1")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "client-login",
                "innerHtml" => "I already have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "client-registration-form-step-1",
        "class" => ""
    ]);
}

/**
 * Client registration form set up step 2
 * @return void
 */
function runClientRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "confirm-password",
        "show-password",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "username" => "col-12 my-2",
        "password" => "col-12 my-2",
        "confirm-password" => "col-12 my-2",
        "show-password" => "col-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "confirm-password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Confirm Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "confirm-password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("CLIENT_REGISTRATION_FORM_STEP_2")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete Registration &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "client-registration-form-step-2",
        "class" => "d-none"
    ]);
}

/*
``````````````````````````````````````````````````````````````
CLIENT LOGIN FORM
``````````````````````````````````````````````````````````````
*/

/**
 * Client login form header setup
 * @return void
 */
function runClientLoginFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Account Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}
/**
 * Client login form description set up
 * @return void
 */
function runClientLoginFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Client login form");
    $formDescription->setDescription("Please ensure that you enter the correct username and password for you to access your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/workplace.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Client login form set up
 * @return void
 */
function runClientLoginFormSetup()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "show-password",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);

    $form->setRows(1);
    $form->setCols([
        "username" => "col-md-12 my-2",
        "password" => "col-md-12 my-2",
        "show-password" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2",
        "additional-buttons" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("CLIENT_LOGIN_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to my account &raquo;"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "client-registration",
                "innerHtml" => "I don't have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "client-login-form",
        "class" => ""
    ]);
}


/*
```````````````````````````````````````````````````````````
CLIENT BOOKING FORM
``````````````````````````````````````````````````````````
*/

/**
 * client booking form header setup
 * @return void
 */
function runClientBookingFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Booking Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * client booking form description setup
 * @return void
 */
function runClientBookingFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Client booking form");
    $formDescription->setDescription("Please ensure that you fill all the required fields to process your room booking");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/phone.png"));
    $formDescription->setDescriptionSizing("my-3");
    formDescriptionSetupDefaults($formDescription);

}


/**
 * client booking form setup
 * @return void
 */
function runClientBookingFormSetup()
{
    $form = new Form;
    $form->setFields([
        "expected-checkin-date",
        "expected-checkout-date",
        "number-of-people",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "expected-checkin-date" => "col-12 col-md-12 my-2",
        "expected-checkout-date" => "col-12 col-md-12 my-2",
        "number-of-people" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12 col-md-12",
        "submit" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "expected-checkin-date" => [
            "label" => [
                "for" => "expected checkin date",
                "value" => "<h6><strong>Expected check in date: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "expected-checkin-date",
                "class" => "form-control"
            ]
        ],
        "expected-checkout-date" => [
            "label" => [
                "for" => "expected checkout date",
                "value" => "<h6><strong>Expected check out date: *</strong></h6>",
                "class" => "my-2",
            ],
            "input" => [
                "type" => "date",
                "name" => "expected-checkout-date",
                "class" => "form-control",
            ]
        ],
        "number-of-people" => [
            "label" => [
                "for" => "number of people",
                "value" => "<h6><strong>Number of people *</h6></strong>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "no-of-people",
                "class" => "form-control"
            ]
        ],
        "form-identifier" => [
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "value" => Hashing::encrypt("CLIENT_BOOKING_FORM"),
            ]
        ],
        "submit" => [
            "button" => [
                "type" => "submit",
                "color" => "primary",
                "has-spinner" => true,
                "value" => "Book now"
            ]
        ]
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "client-booking-form"
    ]);
}


/* 
``````````````````````````````````````````````````````````````````
CLIENT PAYMENT FORM
``````````````````````````````````````````````````````````````````
*/

/**
 * Client payment form header setup
 * @return void
 */

function runClientPaymentFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Payment details");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}


function runClientPaymentFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Client payment form");
    $formDescription->setDescription("Please ensure that you fill all the required fields to complete your payment");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/dollar.png"));
    $formDescription->setDescriptionSizing("my-3");
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Client payment form setup
 * @return void
 */
function runClientPaymentFormSetup()
{
    $form = new Form;
    $form->setFields([
        "payment-amount",
        "payment-mode",
        "transaction-code",
        "payment-type",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "payment-mode" => "col-md-12 col-12",
        "payment-amount" => "col-md-12 col-12",
        "payment-type" => "col-md-12 col-12",
        "transaction-code" => "col-md-12 col-12",
        "form-identifier" => "col-md-12 col-12",
        "submit" => "col-md-12 col-12"
    ]);
    $form->setContent([
        "payment-amount" => [
            "label" => [
                "for" => "Payment amount",
                "class" => "my-2",
                "value" => "<h6><strong>Payment amount: *</strong></h6>"
            ],
            "input" => [
                "type" => "number",
                "name" => "amount",
                "class" => "form-control"
            ]
        ],
        "payment-mode" => [
            "label" => [
                "for" => "Payment mode",
                "class" => "my-2",
                "value" => "<h6><strong>Payment mode: *</strong></h6>"
            ],
            "select" => [
                "class" => "form-select",
                "name" => "mode",
                "options" => ["Mpesa"]
            ]
        ],
        "payment-type" => [
            "label" => [
                "for" => "Payment type",
                "class" => "my-2",
                "value" => "<h6><strong>Payment type: *</strong></h6>",
            ],
            "select" => [
                "class" => "form-select",
                "name" => "type",
                "options" => ["Deposit", "Full payment"],
            ]
        ],
        "transaction-code" => [
            "label" => [
                "for" => "Transaction code",
                "class" => "my-2",
                "value" => "<h6><strong>Transaction code: *</strong></h6>"
            ],
            "input" => [
                "type" => "text",
                "name" => "transaction-code",
                "class" => "form-control"
            ]
        ],
        "form-identifier" => [
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "value" => Hashing::encrypt("CLIENT_PAYMENT_FORM")
            ]
        ],
        "submit" => [
            "button" => [
                "color" => "primary",
                "has-spinner" => "true",
                "value" => "Complete payment &raquo",
                "type" => "submit"
            ]
        ]
    ]);
    $form->runSetup(["method" => "POST", "action" => "", "id" => "client-payment-form", "class" => ""]);
}