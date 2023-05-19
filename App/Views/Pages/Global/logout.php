<?php

use Models\Core\App\Utilities\Session;

Session::start();
Session::end();
header("location:home");