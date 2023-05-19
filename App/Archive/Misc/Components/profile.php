<section class="container">

    <!-- Home page header -->
    <?php

    use Models\Core\App\Utilities\Url;

    runStaffHomePageHeaderSetup(); ?>

    <!-- Home page body -->
    <div class="row mx-1 mt-3">
        <!-- Home page body col -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <h5 class="mt-3 text-primary">
                                <img src="<?php echo Url::getReference("resources/assets/images/png/team.png") ?>"
                                    class="img-fluid small">
                                Clients
                            </h5>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-end">
                                <h6 class="text-muted">Total number of records : 12</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Consist of clients with user accounts</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" href="view-guests">
                            <img src="<?php echo Url::getReference("resources/assets/images/png/open-folder.png") ?>"
                                class="img-fluid small">
                            View Clients</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <h5 class="mt-3 text-primary">
                                <img src="<?php echo Url::getReference("resources/assets/images/png/user.png") ?>"
                                    class="img-fluid small">
                                Guests
                            </h5>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-end">
                                <h6 class="text-muted">Total number of records : 12</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="my-2">Consist of clients who have booked, checked in or checked out of rooms</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary ms-3 text-nowrap" href="view-guests">
                            <img src="<?php echo Url::getReference("resources/assets/images/png/open-folder.png") ?>"
                                class="img-fluid small">
                            View guests</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <h5 class="mt-3 text-primary">
                                <img src="<?php echo Url::getReference("resources/assets/images/png/meeting.png") ?>"
                                    class="img-fluid small">
                                Staff
                            </h5>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-end">
                                <h6 class="text-muted">Total number of records : 12</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Consist of staff members working for the company</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary ms-3" href="view-guests">
                            <img src="<?php echo Url::getReference("resources/assets/images/png/open-folder.png") ?>"
                                class="img-fluid small">
                            View Staff</a>
                        <a class="btn btn-secondary ms-3" href="view-guests">
                            <img src="<?php echo Url::getReference("resources/assets/images/png/add.png") ?>"
                                class="img-fluid small">
                            Add Staff</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>