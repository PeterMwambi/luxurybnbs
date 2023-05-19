<?php

namespace Models\Core\Data\Classes;

use Models\Core\App\Dependancies\Settings as FormSettings;

class Settings
{


    private static $form;
    private static function _FormSettingsInstance()
    {
        $formDataInstance = new FormSettings;
        return ((array) $formDataInstance->GetFormSettings("Settings"));
    }

    public static function SetForm(string $form)
    {
        if (!isset(self::$form)) {
            self::$form = $form;
            return;
        }
        return;
    }

    private static function _GetForm()
    {
        if (isset(self::$form)) {
            return self::_FormSettingsInstance()[self::$form];
        }
        return;
    }

    public static function GetRulePath()
    {
        return self::_GetForm()->rules;
    }

    public static function GetAction()
    {
        return self::_GetForm()->action;
    }

    public static function GetMethodHandler()
    {
        return self::_GetForm()->method;
    }

    public static function GetData()
    {
        return self::_GetForm()->data;
    }

    public static function GetSuccessMessage()
    {
        return self::_GetForm()->successmessage;
    }

    public static function GetErrorMessage()
    {
        return self::_GetForm()->errormessage;
    }

    public static function GetNextStep()
    {
        return self::_GetForm()->nextstep;
    }
}