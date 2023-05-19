<?php

use Models\Auth\Input;
use Models\Auth\Sanitize;

/**
 * @author Peter Mwambi
 * @date Mon Jan 09 2023 17:13:57 GMT+0300 (East Africa Time)
 * @updated Mon Jan 09 2023 17:13:57 GMT+0300 (East Africa Time)
 * @content - Form Data Generator
 * 
 * Form data is generated and stored in the constant `GENERATE_FORM_DATA`
 * Use methods to perform actions in future.
 * Let All configurations be stored in json format
 */
define(
    "GENERATE_FORM_DATA",


    array(



        /**
         * MEMBER LOGIN FORM - STEP 1
         * ACCOUNT INFORMATION
         * 
         * -Consist of clients account information
         * 
         * Fields
         * 1. Username - Clients username
         * 2. Email - Clients email
         * 3. Password - Clients password
         * 
         * Notes
         * Both Username and email can be used interchangebly 
         */

        "login-form-step-1" =>
        array(
            "Path" => "login/step1-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "You have successfully completed step 1",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToLoginStep2",
            "Data" => array(
                "Username" => Sanitize::String(Input::Get("username")),
                "Email" => Sanitize::String(Input::Get("email")),
                "Password" => Sanitize::String(Input::Get("password"))
            ),
        ),


        "login-form-step-2" => array(
            "Path" => "login/step2-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "Login was successfull",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToFinalStep",
            "Data" => array(
                "SecurityQuestion1" => Sanitize::String(Input::Get("security-question-1")),
                "SecurityAnswer1" => Sanitize::String(Input::Get("security-answer-1"))
            )
        ),



        /**
         * MEMBER REGISTRATION FORM - STEP 1
         * PERSONAL INFORMATION
         * 
         * -Consist of clients personal information
         * 
         * Fields
         * 1.UserId - A unique id used as both a PRIMARY_KEY and a FOREIGN_KEY 
         * 2.Firstname - Clients firstname
         * 3.Lastname - Clients lastname
         * 4.Gender - Clients gender
         * 5.Age - Clients age
         * 6.Natonality - Clients nationality
         * 7.MaritalStatus - Clients marital status
         * 8.Occupation - Clients occupation
         * 9.TermsAndConditions - Clients must accept the terms and conditions
         *                        before proceeding with registration 
         */
        "registration-form-step-1" =>
        array(
            "Path" => "registration/step1-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "You have successfully completed step 1",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToRegistrationStep2",
            "Data" => array(
                "UserId" => strtoupper(uniqid()),
                "Firstname" => Sanitize::String(Input::Get("firstname")),
                "Lastname" => Sanitize::String(Input::Get("lastname")),
                "Gender" => Sanitize::String(Input::Get("gender")),
                "Age" => Sanitize::String(Input::Get("age")),
                "Nationality" => Sanitize::String(Input::Get("nationality")),
                "MaritalStatus" => Sanitize::String(Input::Get("marital-status")),
                "Occupation" => Sanitize::String(Input::Get("occupation")),
                "TermsAndConditions" => Sanitize::String(Input::Get("termsandconditions"))
            )
        ),

        /**
         * MEMBER REGISTRATION FORM - STEP 2
         * CONTACT INFORMATION
         * 
         * -Consist of clients contact information. provides a
         * means of tracking the client and providing them with 
         * appropriate information based on their location.
         * 
         * Fields
         * 1. County - Clients current residential county
         * 2. SubCounty - Clients current residential subcounty
         * 3. Location - Clients current location
         * 4. City - Clients nearest major city
         * 5. PhoneNumber - Clients phone number
         * 6. EmailAddress - Clients email address
         * 7. National Id - Clients national Identification card number
         * 
         */
        "registration-form-step-2" =>
        array(
            "Path" => "registration/step2-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "You have successfully completed step 2",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToRegistrationStep3",
            "Data" => array(
                "County" => ucfirst(strtolower(Sanitize::String(Input::Get("county")))),
                "SubCounty" => ucfirst(strtolower(Sanitize::String(Input::Get("sub-county")))),
                "Location" => ucfirst(strtolower(Sanitize::String(Input::Get("location")))),
                "City" => ucfirst(strtolower(Sanitize::String(Input::Get("city")))),
                "PhoneNumber" => "+254" . Sanitize::String(Input::Get("phone-number")),
                "EmailAddress" => Sanitize::Email(Input::Get("email-address")),
                "NationalId" => Sanitize::String(Input::Get("identification"))
            )
        ),

        /**
         * MEMBER REGISTRATION FORM - STEP 3
         * KEY SKILLS AND COMPETENCIES
         * 
         * - Consist of education level, skills,talents, knowledge 
         * and bio information of the client.
         * 
         * Fields
         * 1. EducationLevel - Client education level
         * 2. KeySkills - Clients skills, knowledge, talents, special abilties
         * 3. BioInformation - A short description about the client
         * 
         */
        "registration-form-step-3" =>
        array(
            "Path" => "registration/step3-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "You have successfully completed step 3",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToRegistrationStep4",
            "Data" => array(
                "EducationLevel" => Sanitize::String(Input::Get("education-level")),
                "KeySkills" => Sanitize::String(Input::Get("skills")),
                "BioInformation" => Sanitize::String(Input::Get("bio"))
            )
        ),


        /**
         * MEMBER REGISTRATION FORM - STEP 4
         * ACCOUNT INFORMATION
         * 
         * - Contains user account information. Used for authentication
         * during client login
         * 
         * Fields
         * Username - Client username
         * Password - Client password
         * ConfirmPassword - Client must re-enter their password
         * 
         */
        "registration-form-step-4" =>
        array(
            "Path" => "registration/step4-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "Lets get you finished up",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToRegistrationStep5",
            "Data" => array(
                "Username" => Sanitize::String(Input::Get("username")),
                "Password" => Sanitize::String(Input::Get("password")),
                "ConfirmPassword" => Sanitize::String(Input::Get("confirm-password"))
            )
        ),

        /**
         * MEMBER REGISTRATION FORM - STEP 5
         * SECURITY INFORMATION
         * 
         * - Provides an extra layer of security. Contains security
         * questions answered by the client and can be used to retreive 
         * a clients account whenever they forget their password
         * 
         * Fields
         * 1.Security Question 1 - First security question
         * 2.Security Answer 1 - First security answer
         * 3.Security Question 2 - Second security question
         * 4.Security Answer 2 - Second security answer
         * 5.Security Question 3 - Third security question
         * 6.Security Answer 3 - Third security answer
         * 
         */
        "registration-form-step-5" =>
        array(
            "Path" => "registration/step5-rules",
            "Action" => "StoreToCache",
            "Method" => "StoreToCache",
            "SuccessMessage" => "Your account has been set up successfully",
            "ErrorMessage" => "Something unexpected seems to have happened. Please try again later",
            "NextAction" => "GoToFinalStep",
            "Data" => array(
                "SecurityQuestion1" => Sanitize::String(Input::Get("security-question-1")),
                "SecurityAnswer1" => Sanitize::String(Input::Get("security-answer-1")),
                "SecurityQuestion2" => Sanitize::String(Input::Get("security-question-2")),
                "SecurityAnswer2" => Sanitize::String(Input::Get("security-answer-2")),
                "SecurityQuestion3" => Sanitize::String(Input::Get("security-question-3")),
                "SecurityAnswer3" => Sanitize::String(Input::Get("security-answer-3"))
            )
        )
    )
);