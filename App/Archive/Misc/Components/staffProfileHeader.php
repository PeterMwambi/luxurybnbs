<div class="row">
    <div class="col-md-7">
        <div class="my-2 mx-3">
            <h3>Hi Peter,</h3>
            <h6>Welcome to the administrators dashboard.</h6>
            <h6>Today is:
                <?php

                use Views\Includes\Components\Classes\Page;

                echo Page::date(); ?>
            </h6>
        </div>
    </div>
    <div class="col-md-5">
        <div class="d-flex justify-content-end">
            <div class="my-2 mx-3">
                <h6>
                    Last logged in:
                    <?php echo date("l, d/m/Y") ?>
                </h6>
                <h6>
                    Total number of tables: 12
                </h6>
            </div>
        </div>
    </div>
</div>