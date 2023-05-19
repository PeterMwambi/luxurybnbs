<?php

use Models\Auth\Input;
use Models\Auth\Token;
use Models\Core\App\Database\Queries\Read\Client;
use Models\Core\App\Database\Queries\Read\Rooms;
use Models\Core\App\Database\Queries\Read\Staff;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));


runClientViewBookings();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>
</head>

<body>


    <div class="alert alert-info" role="alert">
        <div class="d-flex justify-content-center">

        </div>
        <?php

        runStaffViewBookingsSetup();

        runStaffViewPaymentsSetup();
        ?>
    </div>
    </div>


    <?php runDiscountAlertSetUp() ?>


    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>

</body>

</html>