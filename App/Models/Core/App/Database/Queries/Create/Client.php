<?php


namespace Models\Core\App\Database\Queries\Create;

use Models\Auth\Token as AuthToken;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Database\Queries\Read\Client as ReadClient;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

class Client extends Provider
{


    public function bookClient($data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("LBNBS");
        parent::setUniqId();
        $this->registerClientBookingDetailsStep1();
        $this->registerClientBookingDetailsStep2();
    }

    public function processPayment(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("LBNBS");
        parent::setUniqId();
        $this->processPaymentStep1();
        $this->processPaymentStep2();
        $this->processDiscount();
        if (Session::exists("CLIENT_DISCOUNT_ID")) {
            parent::setTable("discounts");
            parent::setQueryData(
                [
                    "set" => array(
                        "d_status" => "used"
                    ),
                    "where" => array(
                        "d_id" => Session::get("CLIENT_DISCOUNT_ID")
                    )
                ]
            );
            parent::update();
            Session::destroy("CLIENT_DISCOUNT_ID");
        }
        parent::setTable("booking_details");
        parent::setQueryData(
            [
                "set" => array(
                    "bkd_status" => "complete"
                ),
                "where" => array(
                    "bk_id" => Session::get("CLIENT_PAYMENT_BOOKING_ID")
                )
            ]
        );
        parent::update();
    }

    private function getClientId()
    {
        parent::setTable("client_account_info");
        $this->setFieldItems(["cl_id"]);
        parent::setFetch(0);
        $this->setWhere(["client_account_info.cl_username", "=", Session::get("cl_username")]);
        parent::setFetchControl("array");
        return $this->selectWithResults()["cl_id"];
    }

    private function getDiscount()
    {
        Session::start();
        parent::setAction("SELECT");
        parent::setFieldItems("
            discounts.d_amount
        ");
        parent::setTable("discounts");
        parent::setJoinClause("
        WHERE discounts.d_id= ?");
        parent::setWhere([Session::get("CLIENT_DISCOUNT_ID")]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        return parent::queryDataWithResults();
    }

    private function processDiscountAmount()
    {

        parent::generateFormData("client-payment-form");
        $data = parent::getFormData();
        $discount = number_format(($data["amount"] / 60));
        return $discount;
    }

    private function processDiscount()
    {
        $data = [
            "d_id" => parent::getUniqId(),
            "cl_id" => $this->getClientId(),
            "d_amount" => $this->processDiscountAmount(),
            "d_date_generated" => DateTime::run()->getDateTimeAsJson(),
            "d_status" => "active"
        ];
        parent::setTable("discounts");
        parent::setQueryData($data);
        parent::insert();
    }
    private function processPaymentStep1()
    {
        $data = [
            "pm_id" => parent::getUniqId(),
            "bk_id" => Session::get("CLIENT_PAYMENT_BOOKING_ID"),
        ];
        parent::setTable("payments");
        parent::setQueryData($data);
        parent::insert();
    }

    private function processPaymentStep2()
    {
        parent::generateFormData("client-payment-form");
        parent::modifyFormDataKeys("-", "_", true, "pmd_");
        $balance = Session::exists("CLIENT_FULL_PAYMENT") ? $this->getPaymentBalance()["pmd_amount"] : $this->getBookingDetails()["rm_price"];
        $data = parent::getFormData();
        $data["pm_id"] = $this->getUniqId();
        if (Session::exists("CLIENT_DISCOUNT_ID")) {
            $data["pmd_discount"] = !empty($this->getDiscount()["d_amount"]) ? $this->getDiscount()["d_amount"] : 0;
            $data["pmd_balance"] = $balance - $data["pmd_amount"] - $data["pmd_discount"];
        } else {
            $data["pmd_balance"] = $balance - $data["pmd_amount"];
            $data["pmd_discount"] = 0;
        }
        $data["pmd_date"] = DateTime::run()->getDateTimeAsJson();
        $data["pmd_status"] = ($data["pmd_balance"] > 0) ? "pending" : "verified";
        if (Session::exists("CLIENT_FULL_PAYMENT")) {
            parent::setTable("payment_details");
            parent::setQueryData(
                [
                    "set" => array(
                        "pmd_status" => $data["pmd_status"],
                        "pmd_balance" => $data["pmd_balance"],
                        "pmd_date" => DateTime::run()->getDateTimeAsJson(),
                        "pmd_type" => $data["pmd_type"],
                        "pmd_discount" => $data["pmd_discount"]
                    ),
                    "where" => array(
                        "pm_id" => Session::get("CLIENT_FULL_PAYMENT")
                    )
                ]
            );
            parent::update();
        } else {
            parent::setTable("payment_details");
            parent::setQueryData($data);
            parent::insert();
        }

    }




    private function getBookingDetails()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("rooms.rm_price");
        parent::setTable("bookings");
        parent::setJoinClause("INNER JOIN rooms ON bookings.rm_id = rooms.rm_id WHERE bookings.bk_id = ?");
        parent::setWhere([Session::get("CLIENT_PAYMENT_BOOKING_ID")]);
        return parent::queryDataWithResults();
    }

    private function getPaymentBalance()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("payment_details.pmd_amount");
        parent::setTable("payment_details");
        parent::setJoinClause("WHERE payment_details.pm_id = ?");
        parent::setWhere([Session::get("CLIENT_FULL_PAYMENT")]);
        return parent::queryDataWithResults();
    }
    public function registerClient(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("LBNBS");
        parent::setUniqId();
        $this->regsterClientDataFromStep1();
        $this->registerClientDataFromStep2();
        Session::set("CLIENT_ACCOUNT_ACCESS", AuthToken::run()::generate("CLIENT_USER_AUTH"));
        return true;
    }


    private function regsterClientDataFromStep1()
    {
        parent::generateFormData("client-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "cl_");
        $data = parent::getFormData();
        $data["cl_id"] = $this->getUniqId();
        $data["cl_phone_number"] = "+254" . $data["cl_phone_number"];
        $data["cl_date_of_birth"] = DateTime::run()->formatDate($data["cl_date_of_birth"], "d/m/Y");
        parent::setTable("client_personal_info");
        parent::setQueryData($data);
        parent::insert();
    }

    private function registerClientDataFromStep2()
    {
        parent::generateFormData("client-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "cl_");
        parent::pushSelectedKeys(["cl_username", "cl_password"]);
        $data = parent::getFormData();
        $data["cl_id"] = $this->getUniqId();
        $data["cl_password"] = password_hash($data["cl_password"], PASSWORD_DEFAULT);
        $data["cl_date_created"] = DateTime::run()->getDateTimeAsJson();
        $data["cl_last_login"] = DateTime::run()->getDateTimeAsJson();
        Session::set("cl_username", $data["cl_username"]);
        parent::setTable("client_account_info");
        parent::setQueryData($data);
        parent::insert();
    }


    private function registerClientBookingDetailsStep1()
    {
        $data = [
            "bk_id" => $this->getUniqId(),
            "cl_id" => $this->getClientId(),
            "rm_id" => Session::get("CLIENT_BOOKING_ROOM_ID")
        ];
        parent::setTable("bookings");
        parent::setQueryData($data);
        parent::insert();
    }

    private function registerClientBookingDetailsStep2()
    {
        parent::generateFormData("client-booking-form");
        parent::modifyFormDataKeys("-", "_", true, "bkd_");
        $data = parent::getFormData();
        $startDate = date("d", DateTime::formatStringToTime($data["bkd_expected_checkin_date"]));
        $endDate = date("d", DateTime::formatStringToTime($data["bkd_expected_checkout_date"]));
        $duration = (int) $endDate - (int) $startDate;
        $data["bk_id"] = $this->getUniqId();
        $data["bkd_status"] = "active";
        $data["bkd_expected_checkin_date"] = DateTime::run()->formatDate($data["bkd_expected_checkin_date"], "d/m/Y");
        $data["bkd_expected_checkout_date"] = DateTime::run()->formatDate($data["bkd_expected_checkout_date"], "d/m/Y");
        $data["bkd_date_of_booking"] = DateTime::run()->getDateTimeAsJson();
        $data["bkd_stay_duration"] = $duration . " days";
        parent::setTable("booking_details");
        parent::setQueryData($data);
        parent::insert();
    }




}