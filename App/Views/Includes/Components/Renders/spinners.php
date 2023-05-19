<?php

use Views\Includes\Components\Classes\Spinner;

function runSpinnerSetup()
{
    $spinner = new Spinner;
    $spinner->setName("staff-registration");
    $spinner->setType("spinner-grow");
    $spinner->setSize("sm");
    $spinner->setCount(4);
    $spinner->setColor("primary spinner");
    $spinner->setJustify("center");
    $spinner->setDisplay("d-none");
    $spinner->runSetup();
}