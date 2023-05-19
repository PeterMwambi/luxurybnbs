<?php

use Models\Core\App\Cache\Storage;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

Storage::clearCache();


if (Session::exists("STAFF_ACCOUNT_ACCESS")) {
    runStaffNavbarSetUp(Page::run()->getTitle());
} else {
    runClientNavbarSetUp(Page::run()->getTitle());
}

runStaffFormHandler();
?>


<script>
    function readFile(input) {
        var file = $("input[type='file']").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $(".upload-icon").attr("src", reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
</script>