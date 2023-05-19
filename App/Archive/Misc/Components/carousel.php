<?php

use Models\Core\App\Utilities\Url;

?>

<!-- Carousel Id -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <!-- Carousel Item Counter -->
        <!-- Carousel Slides: First Slide, Second Slide -->
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="First slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="Fourth slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="Fifth slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="5" aria-label="Sixth slide"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Carousel Items -->
        <div class="carousel-item active">
            <!-- Carousel item active -->
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(livingroom).jpg") ?>"
                class="carousel-image" alt="First slide">
            <!-- Has description: -->
            <!-- Carousel Item Description -->
            <div class="carousel-desc">
                <div class="d-flex justify-content-end">
                    <div class="col-md-8 card">
                        <div class="card-body">
                            <!-- Carousel description Heading -->
                            <h4 class="text-primary">Executive 2 bedroom family suite</h4>
                            <!-- Carousel description -->
                            <p class="">2 bedroom apartment with spacious living room, kitchen, dining room,
                                bathroom, toilet and own balcony. </p>

                            <div class="d-flex">
                                <!-- Carousel description Price -->
                                <h4 class="text-dark"><strong>4,500 KSh</strong></h4>
                                <!-- Carousel description Billing -->
                                <small class="mx-2 mt-2">per night</small>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Carousel description status -->
                                    <button type="button" class="btn btn-sm btn-outline-success mt-1">Available</button>
                                </div>
                                <div class="col-md-8">
                                    <!-- Carousel description buttons -->
                                    <div class="d-flex justify-content-end">
                                        <!-- Carousel description button links -->
                                        <a class="btn btn-primary" href="#">Book Now &raquo;</a>
                                        <a class="btn btn-secondary mx-3" href="#">Find out more &raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Item -->
        <div class="carousel-item">
            <!-- Carousel Image -->
            <!-- Has description: false -->
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(kitchen).jpg") ?>"
                class="carousel-image" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(diningroom).jpg") ?>"
                class="carousel-image" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(bedroom1).jpg") ?>"
                class="carousel-image" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(bedroom2).jpg") ?>"
                class="carousel-image" alt="Fifth slide">
        </div>
        <div class="carousel-item">
            <img src="<?php echo Url::GetReference("resources/assets/images/jpeg/Room1(bathroom1).jpg") ?>"
                class="carousel-image" alt="Sixth slide">
        </div>
    </div>
    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>