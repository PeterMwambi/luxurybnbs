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
            <div class="card my-5">

                <div class="card-body p-4">
                    <?php runFormHeaderSetUp(); ?>


                    <?php runSpinnerSetUp(); ?>


                    <?php runFormAlertSetup(); ?>

                    <div class="mt-3">
                        <?php runCompleteSetupAlert(); ?>
                        <?php runStaffRegistrationFormSetupStep2(); ?>
                        <?php runStaffRegistrationFormSetupStep1(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>