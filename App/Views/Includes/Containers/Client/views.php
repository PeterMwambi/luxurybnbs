<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

runClientNavbarSetUp(Page::run()->getTitle());

runClientViewsHandler();

?>