<?php

namespace Models\Core\App\Database\Queries\Read;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

/**
 * Next versions should implement hashes for login
 */
class Client extends Provider
{

    private static $instance = null;


    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Client;
        }
        return self::$instance;
    }


    public function loginClient(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    private function prepareLoginPrimitives()
    {
        parent::generateFormData("client-login-form");
        $data = parent::getFormData();
        $username = $data["username"];
        Session::start();
        Session::set("CLIENT_ACCOUNT_ACCESS", Token::run()::generate("CLIENT_USER_AUTH"));
        Session::set("cl_username", $username);
        parent::setTable("client_account_info");
        parent::setQueryData(
            [
                "set" => array(
                    "cl_last_login" => DateTime::run()->getDateTimeAsJson()
                ),
                "where" => array(
                    "cl_username" => $username
                )
            ]
        );
        parent::update();
    }

    public function getClientFirstname(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            client_personal_info.cl_firstname,
            client_personal_info.cl_id");
        parent::setTable("client_personal_info");
        parent::setJoinClause("INNER JOIN 
            client_account_info 
            ON 
            client_personal_info.cl_id = client_account_info.cl_id
            WHERE client_account_info.cl_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->cl_firstname;
    }

    public function getClientBookingDetails(string $status = "active")
    {
        Session::start();
        parent::setAction("SELECT");
        parent::setFieldItems("bookings.bk_id,
        client_account_info.cl_id,
        client_personal_info.cl_firstname,
        client_personal_info.cl_lastname,
        client_personal_info.cl_gender,
        booking_details.bkd_expected_checkin_date,
        booking_details.bkd_expected_checkout_date,
        booking_details.bkd_status,
        booking_details.bkd_date_of_booking,
        rooms.rm_name,
        rooms.rm_price"
        );
        parent::setTable("bookings");
        parent::setJoinClause("INNER JOIN booking_details
        ON 
        bookings.bk_id = booking_details.bk_id 
        INNER JOIN rooms 
        ON 
        bookings.rm_id = rooms.rm_id
        INNER JOIN client_account_info
        ON 
        bookings.cl_id = client_account_info.cl_id
        INNER JOIN client_personal_info
        ON
        bookings.cl_id = client_personal_info.cl_id
        WHERE client_account_info.cl_username = ? AND booking_details.bkd_status = ?");
        parent::setWhere([Session::get("cl_username"), $status]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getClientPayments(string $status = "pending")
    {
        Session::start();
        parent::setAction("SELECT");
        parent::setFieldItems("
            payments.pm_id,
            client_personal_info.cl_firstname,
            client_personal_info.cl_lastname,
            payment_details.pmd_amount,
            payment_details.pmd_balance,
            payment_details.pmd_mode,
            payment_details.pmd_type,
            payment_details.pmd_status,
            payment_details.pmd_transaction_code,
            payment_details.pmd_date,
            payment_details.pmd_balance,
            payment_details.pmd_discount
        ");
        parent::setTable("payments");
        parent::setJoinClause("INNER JOIN payment_details
        ON 
        payments.pm_id = payment_details.pm_id
        INNER JOIN bookings
        ON
        payments.bk_id = bookings.bk_id
        INNER JOIN client_personal_info
        ON
        bookings.cl_id = client_personal_info.cl_id
        INNER JOIN client_account_info
        ON
        client_personal_info.cl_id = client_account_info.cl_id 
        WHERE client_account_info.cl_username = ? AND payment_details.pmd_status = ?");
        parent::setWhere([Session::get("cl_username"), $status]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getClientDiscounts(int $fetch = 1, $status = "active")
    {
        Session::start();
        parent::setAction("SELECT");
        parent::setFieldItems("
            discounts.d_id,
            client_personal_info.cl_firstname,
            client_personal_info.cl_lastname,
            discounts.d_amount,
            discounts.d_date_generated,
            discounts.d_status
        ");
        parent::setTable("discounts");
        parent::setJoinClause("INNER JOIN client_personal_info
        ON 
        discounts.cl_id = client_personal_info.cl_id
        INNER JOIN client_account_info
        ON
        discounts.cl_id = client_account_info.cl_id
        WHERE client_account_info.cl_username = ? AND discounts.d_status = ?");
        parent::setWhere([Session::get("cl_username"), $status]);
        parent::setFetchControl("array");
        parent::setFetch($fetch);
        return parent::queryDataWithResults();
    }
}