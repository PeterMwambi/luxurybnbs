<?php

use Models\Core\App\Utilities\Url;

?>

<div class="alert alert-danger alert-dismissable fade show d-none" role="alert">
    <div class="d-flex">
        <div>
            <img src="<?php echo Url::GetReference("resources/assets/images/png/warning.png") ?>"
                class="img-fluid small error">
        </div>
        <div>
            <img src="<?php echo Url::GetReference("resources/assets/images/png/correct.png") ?>"
                class="img-fluid small d-none success">
        </div>
        <div class="mx-2">
            <h6 class="mt-1"><strong class="alert-heading">Oops! We run into an error</strong></h6>
        </div>
    </div>
    <div class="mx-2">
        *<em class="alert-text">Your Firstname is required</em>
    </div>
    <div class="mx-2">
        <h6 class="mt-1 alert-footnote">Please correct the field then try again</h6>
    </div>
</div>