<?php

use Models\Core\App\Utilities\Url;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));


?>

<?php runClientNavbarSetUp("staff-registration"); ?>


<section class="container-fluid mt-lg">
    <div class="row mt-3">
        <div class="col-md-6 my-5">
            <?php runFormDescriptionSetup(); ?>
        </div>
        <div class="col-md-5 my-5">
            <?php runProgressBarSetup(); ?>
            <?php runStaffRegistrationFormCardHolderSetup(); ?>
        </div>
    </div>
</section>