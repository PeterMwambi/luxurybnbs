<?php

use Models\Core\App\Utilities\Url;

?>

<div class="row justify-content-center d-none" id="complete-setup">
    <div class="col-12 mt-3 d-flex justify-content-center">
        <img src="<?php echo Url::GetReference("resources/assets/images/png/correct.png") ?>" class="img-fluid medium">
    </div>
    <div class="col-12 mt-3">
        <div class="mb-3 d-flex justify-content-center">
            <h3><strong>Congratulations</strong></h3>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <h6 class="text-center col-9 info-text">Your account has been created successfully. You are now a member of
                the
                team</h6>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <em class="text-center">You will be redirected to your profile shortly. Enjoy</em>
        </div>
    </div>

</div>