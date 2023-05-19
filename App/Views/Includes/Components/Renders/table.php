<?php

use Models\Auth\Input;
use Models\Core\App\Database\Queries\Read\Client;
use Models\Core\App\Database\Queries\Read\Rooms;
use Models\Core\App\Database\Queries\Read\Staff;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Table;



function setTableDefaultProperties(Table $table)
{
    $table->setType("default");
    $table->setTableColor("light");
    $table->setTableType("bordered");
}
function runStaffViewRoomsSetup()
{
    $rooms = new Rooms;
    $keys = [
        "Image",
        "Room Id",
        "Name",
        "Type",
        "Number",
        "Price",
        "Status",
        "Date Added"
    ];
    $data = [];
    foreach ($rooms->getRooms() as $room) {
        $date = json_decode($room["rm_date_added"]);
        $room["rm_date_added"] = $date->day . ", " . $date->date . " " . $date->time;
        $room["rm_pictures"] = '<img src="' . Url::getReference("uploads/rooms/" . $room["rm_pictures"]) . '" class="img-fluid sm-medium">';
        array_push($data, Formatter::run()->formatArray(array_values($room), $keys));
    }
    $table = new Table;
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);

    $table->setHasActionButtons(true);
    $table->setActionButtonContent([
        "View room",
        "Delete room"
    ]);
    $table->setActionButtonClasses([
        "View room" => "btn btn-primary",
        "Delete room" => "btn btn-danger",
    ]);
    $table->setActionButtonLinks([
        "View room" => "#",
        "Delete room" => "#"
    ]);

    $table->runSetup();
}



function runStaffViewPaymentsSetup()
{
    if (Session::exists("CLIENT_PAYMENT_STATUS")) {
        $payments = is_array(Staff::run()->getPayments()) ? Staff::run()->getPayments() : array();
    } else {
        $payments = is_array(Staff::run()->getPayments()) ? Staff::run()->getPayments() : array();
    }
    $data = [];
    $table = new Table;

    $keys = [
        "Firstname",
        "Lastname",
        "Amount",
        "Balance",
        "Discount",
        "Payment mode",
        "Transaction code",
        "Payment type",
        "Payment status",
        "Payment date"
    ];
    foreach ($payments as $payment) {
        $date = json_decode($payment["pmd_date"]);
        $payment["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $generatedData = [
            $payment["cl_firstname"],
            $payment["cl_lastname"],
            $payment["pmd_amount"],
            $payment["pmd_balance"],
            $payment["pmd_discount"],
            $payment["pmd_mode"],
            $payment["pmd_transaction_code"],
            $payment["pmd_type"],
            $payment["pmd_status"],
            $payment["pmd_date"]
        ];
        if ($payment["pmd_balance"] > 0) {
            $table->setHasActionButtons(true);
            $table->setActionButtonContent([
                "Complete payment",
            ]);
            $table->setActionButtonLinks([
                "Complete payment" => "client-payment?paymentid=" . $payment["pm_id"],
            ]);
            $table->setActionButtonClasses([
                "Complete payment" => "btn btn-primary text-nowrap",
            ]);
        }
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);

    $table->runSetup();
}


function runStaffViewBookingsSetup(){
    if (Session::exists("CLIENT_BOOKING_STATUS")) {
        $bookings = is_array(Staff::run()->getBookings()) ? Staff::run()->getBookings() : array();
    } else {
        $bookings = is_array(Staff::run()->getBookings()) ? Staff::run()->getBookings() : array();
    }
    $table = new Table;

    $data = [];
    $keys = [
        "firstname",
        "lastname",
        "gender",
        "Room",
        "Date of booking",
        "Expected check in date",
        "Expected check out date",
        "Status",
        "Payment amount"
    ];
    foreach ($bookings as $booking) {
        $date = json_decode($booking["bkd_date_of_booking"]);
        $booking["bkd_date_of_booking"] = $date->day . ", " . $date->date . " " . $date->time;
        $generatedData = [
            $booking["cl_firstname"],
            $booking["cl_lastname"],
            $booking["cl_gender"],
            $booking["rm_name"],
            $booking["bkd_date_of_booking"],
            $booking["bkd_expected_checkin_date"],
            $booking["bkd_expected_checkout_date"],
            $booking["bkd_status"],
            $booking["rm_price"] . " Ksh"
        ];
        if ($booking["bkd_status"] === "active") {
            $table->setHasActionButtons(true);
            $table->setActionButtonContent([
                "Pay request",
            ]);
            $table->setActionButtonLinks([
                "Pay request" => "client-payment?bookingid=" . $booking["bk_id"],
            ]);
            $table->setActionButtonClasses([
                "Pay request" => "btn btn-primary text-nowrap",
            ]);
        }
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
    }

    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);
    $table->runSetup();
}

function runClientViewBookings()
{
    if (Session::exists("CLIENT_BOOKING_STATUS")) {
        $bookings = is_array(Client::run()->getClientBookingDetails(Session::get("CLIENT_BOOKING_STATUS"))) ? Client::run()->getClientBookingDetails(Session::get("CLIENT_BOOKING_STATUS")) : array();
    } else {
        $bookings = is_array(Client::run()->getClientBookingDetails()) ? Client::run()->getClientBookingDetails() : array();
    }
    $table = new Table;

    $data = [];
    $keys = [
        "firstname",
        "lastname",
        "gender",
        "Room",
        "Date of booking",
        "Expected check in date",
        "Expected check out date",
        "Status",
        "Payment amount"
    ];
    foreach ($bookings as $booking) {
        $date = json_decode($booking["bkd_date_of_booking"]);
        $booking["bkd_date_of_booking"] = $date->day . ", " . $date->date . " " . $date->time;
        $generatedData = [
            $booking["cl_firstname"],
            $booking["cl_lastname"],
            $booking["cl_gender"],
            $booking["rm_name"],
            $booking["bkd_date_of_booking"],
            $booking["bkd_expected_checkin_date"],
            $booking["bkd_expected_checkout_date"],
            $booking["bkd_status"],
            $booking["rm_price"] . " Ksh"
        ];
        if ($booking["bkd_status"] === "active") {
            $table->setHasActionButtons(true);
            $table->setActionButtonContent([
                "Pay request",
            ]);
            $table->setActionButtonLinks([
                "Pay request" => "client-payment?bookingid=" . $booking["bk_id"],
            ]);
            $table->setActionButtonClasses([
                "Pay request" => "btn btn-primary text-nowrap",
            ]);
        }
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
    }

    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);
    $table->runSetup();
}


function runClientPaymentsSetup()
{
    if (Session::exists("CLIENT_PAYMENT_STATUS")) {
        $payments = is_array(Client::run()->getClientPayments(Session::get("CLIENT_PAYMENT_STATUS"))) ? Client::run()->getClientPayments(Session::get("CLIENT_PAYMENT_STATUS")) : array();
    } else {
        $payments = is_array(Client::run()->getClientPayments()) ? Client::run()->getClientPayments() : array();
    }
    $data = [];
    $table = new Table;

    $keys = [
        "Firstname",
        "Lastname",
        "Amount",
        "Balance",
        "Discount",
        "Payment mode",
        "Transaction code",
        "Payment type",
        "Payment status",
        "Payment date"
    ];
    foreach ($payments as $payment) {
        $date = json_decode($payment["pmd_date"]);
        $payment["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $generatedData = [
            $payment["cl_firstname"],
            $payment["cl_lastname"],
            $payment["pmd_amount"],
            $payment["pmd_balance"],
            $payment["pmd_discount"],
            $payment["pmd_mode"],
            $payment["pmd_transaction_code"],
            $payment["pmd_type"],
            $payment["pmd_status"],
            $payment["pmd_date"]
        ];
        if ($payment["pmd_balance"] > 0) {
            $table->setHasActionButtons(true);
            $table->setActionButtonContent([
                "Complete payment",
            ]);
            $table->setActionButtonLinks([
                "Complete payment" => "client-payment?paymentid=" . $payment["pm_id"],
            ]);
            $table->setActionButtonClasses([
                "Complete payment" => "btn btn-primary text-nowrap",
            ]);
        }
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);



    $table->runSetup();

}

function runClientDiscountSetup()
{

    if (Input::get("did")) {
        runDiscountRedeemAlertSetUp();
    }
    if (Session::exists("CLIENT_DISCOUNT_STATUS")) {
        $discounts = is_array(Client::run()->getClientDiscounts(1, Session::get("CLIENT_DISCOUNT_STATUS"))) ? Client::run()->getClientDiscounts(1, Session::get("CLIENT_DISCOUNT_STATUS")) : array();
    } else {
        $discounts = is_array(Client::run()->getClientDiscounts()) ? Client::run()->getClientDiscounts() : array();
    }
    $table = new Table;
    $data = [];
    $keys = [
        "Firstname",
        "Lastname",
        "Amount",
        "Status",
        "Date generated",
    ];

    foreach ($discounts as $discount) {
        $date = json_decode($discount["d_date_generated"]);
        $discount["d_date_generated"] = $date->day . ", " . $date->date . " " . $date->time;
        $generatedData = [
            $discount["cl_firstname"],
            $discount["cl_lastname"],
            $discount["d_amount"],
            $discount["d_status"],
            $discount["d_date_generated"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        if ($discount["d_status"] === "active") {
            $table->setHasActionButtons(true);
            $table->setActionButtonContent([
                "Redeem",
            ]);
            $table->setActionButtonLinks([
                "Redeem" => "client-discounts?did=" . $discount["d_id"],
            ]);
            $table->setActionButtonClasses([
                "Redeem" => "btn btn-primary text-nowrap",
            ]);
        }

    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setTableData($data);
    $table->runSetup();
}