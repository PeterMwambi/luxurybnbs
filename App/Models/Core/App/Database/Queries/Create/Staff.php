<?php


namespace Models\Core\App\Database\Queries\Create;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

class Staff extends Provider
{

    public function registerStaffMember(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("LBNBS");
        parent::setUniqId();
        $this->regsterStaffMemberDataFromStep1();
        $this->registerStaffMemberDataFromStep2();
        Session::set("STAFF_ACCOUNT_ACCESS", Token::run()::generate("STAFF_USER_AUTH"));
        return true;
    }


    protected function regsterStaffMemberDataFromStep1()
    {
        parent::generateFormData("staff-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "st_");
        $data = parent::getFormData();
        $data["st_id"] = $this->getUniqId();
        $data["st_phone_number"] = "+254" . $data["st_phone_number"];
        parent::setTable("staff_personal_info");
        parent::setQueryData($data);
        parent::insert();
    }

    protected function registerStaffMemberDataFromStep2()
    {
        parent::generateFormData("staff-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "st_");
        parent::pushSelectedKeys(["st_username", "st_password", "st_auth_level", "st_role"]);
        $data = parent::getFormData();
        $data["st_id"] = $this->getUniqId();
        $data["st_password"] = password_hash($data["st_password"], PASSWORD_DEFAULT);
        $data["st_date_created"] = DateTime::run()->getDateTimeAsJson();
        $data["st_last_login"] = DateTime::run()->getDateTimeAsJson();
        Session::set("st_username", $data["st_username"]);
        parent::setTable("staff_account_info");
        parent::setQueryData($data);
        parent::insert();
    }
}