<?php

use Models\Core\App\Utilities\Url;

?>


<nav class="navbar navbar-expand-sm navbar-light bg-light p-3 p-md-0 shadow-sm fixed-top">
    <a class="navbar-brand mx-2 mt-2" href="home">
        <img src="<?php echo Url::GetReference("resources/assets/icons/luxurybnbslogo.png") ?>" alt=""
            class="img-fluid luxury-bnb__logo"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
            <li class="nav-item mx-3">
                <a class="nav-link active" href="home" aria-current="page">Home
                    <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Rooms</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Accomodation</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Sign In</a>
            </li>
            <span class="mt-2 d-none d-md-block">|</span>
            <li class="nav-item mx-3 mb-sm-3 mb-md-0">
                <a class="nav-link btn btn-primary rounded text-white" href="#">Register</a>
            </li>
        </ul>
    </div>
</nav>