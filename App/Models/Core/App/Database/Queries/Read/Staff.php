<?php

namespace Models\Core\App\Database\Queries\Read;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

/**
 * Next versions should implement hashes for login
 */
class Staff extends Provider
{

    private static $instance = null;


    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Staff;
        }
        return self::$instance;
    }


    public function loginClient(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    public function loginStaffMember(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    private function prepareLoginPrimitives()
    {
        parent::generateFormData("staff-login-form");
        $data = parent::getFormData();
        $username = $data["username"];
        Session::set("STAFF_ACCOUNT_ACCESS", Token::run()::generate("STAFF_USER_AUTH"));
        Session::set("st_username", $username);
        parent::setTable("staff_account_info");
        parent::setQueryData(
            [
                "set" => array(
                    "st_last_login" => DateTime::run()->getDateTimeAsJson()
                ),
                "where" => array(
                    "st_username" => $username
                )
            ]
        );
        parent::update();
    }

    public function getStaffMembers()
    {
        Session::start();
        parent::setAction("SELECT");
        parent::setFieldItems("
             staff_personal_info.st_id,
                staff_personal_info.st_firstname,
                staff_personal_info.st_lastname,
                staff_personal_info.st_gender,
                staff_personal_info.st_date_of_birth,
                staff_personal_info.st_age,
                staff_personal_info.st_phone_number,
                staff_account_info.st_date_created,
                staff_account_info.st_last_login,
                staff_account_info.st_role,
                staff_account_info.st_auth_level
        ");
        parent::setTable("staff_account_info");
        parent::setJoinClause("INNER JOIN 
        staff_personal_info
        ON 
        staff_personal_info.st_id= staff_account_info.st_id");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getPayments()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
             payments.pm_id,
             payments.bk_id,
             payment_details.pmd_amount,
             client_personal_info.cl_firstname,
             client_personal_info.cl_lastname,
             payment_details.pmd_status,
             payment_details.pmd_date,
             payment_details.pmd_transaction_code,
             payment_details.pmd_balance,
             payment_details.pmd_mode,
             payment_details.pmd_type,
            payment_details.pmd_discount
        ");
        parent::setTable("payments");
        parent::setJoinClause("
        INNER JOIN payment_details
        ON
        payments.pm_id = payment_details.pm_id
        INNER JOIN bookings
        ON
        payments.bk_id = bookings.bk_id
        INNER JOIN client_personal_info
        ON
        bookings.cl_id = client_personal_info.cl_id ");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getBookings()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            client_personal_info.cl_firstname,
            client_personal_info.cl_lastname,
            client_personal_info.cl_gender,
            booking_details.bkd_expected_checkin_date,
            booking_details.bkd_expected_checkout_date,
            booking_details.bkd_status,
            booking_details.bkd_date_of_booking,
            booking_details.bkd_checkin_date,
            booking_details.bkd_checkout_date,
            rooms.rm_name,
            rooms.rm_price
        ");
        parent::setTable("bookings");
        parent::setJoinClause("
        INNER JOIN booking_details
        ON
        bookings.bk_id = booking_details.bk_id
        INNER JOIN client_personal_info
        ON
        bookings.cl_id = client_personal_info.cl_id
        INNER JOIN rooms ON
        bookings.rm_id = rooms.rm_id");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getStaffFirstname(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            staff_personal_info.st_firstname,
            staff_personal_info.st_id");
        parent::setTable("staff_personal_info");
        parent::setJoinClause("INNER JOIN 
            staff_account_info 
            ON 
            staff_personal_info.st_id = staff_account_info.st_id
            WHERE staff_account_info.st_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->st_firstname;
    }
}