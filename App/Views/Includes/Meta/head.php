<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

?>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
    <?php echo Page::run()->getTitle(); ?>
</title>
<link rel="stylesheet" href="<?php echo Url::GetReference("resources/css/frameworks/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?php echo Url::GetReference("resources/css/custom/style.css"); ?>">
<link rel="icon" href="<?php echo Url::GetReference("resources/assets/icons/luxurybnbslogo.png"); ?>">