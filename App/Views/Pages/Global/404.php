<?php

use Models\Core\App\Utilities\Url;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>
</head>

<body>


    <div class="container-fluid">
        <div class="faq-error__navigation mx-4 my-4">
            <a href="home">Home</a>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="faq-error__body card col-md-5">
                <div class="card-body p-4">
                    <div class="d-md-flex justify-content-center ">
                        <div class="col-md-11 col-12 my-4">
                            <div class="faq-error__heading ">
                                <h3>
                                    Oops!
                                    404 error
                                </h3>
                            </div>
                            <div class="faq-error__message">
                                <emp>We couldn't find your request</emp>
                            </div>
                        </div>
                    </div>
                    <div class="faq-error__options d-flex justify-content-center">
                        <div class="col-md-11 col-12">
                            <div class="faq-error__options-heading">
                                <h5>Don't worry</h5>
                            </div>
                            <div class="faq-error__options-heading">
                                <emp>Here are a few things you can do</emp>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>
</body>

</html>