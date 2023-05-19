<?php

use Models\Core\App\Database\Queries\Read\Rooms;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Carousel;

function runClientHeaderCarouselSetup()
{

    $rooms = new Rooms;


    $data = $rooms->getRoomsWithDescription();

    $carouselSlides = [];

    foreach ($data as $count => $slides) {
        array_push($carouselSlides, "slide" . $count);
    }
    $keys = $carouselSlides;
    $slideItems = [];
    foreach ($carouselSlides as $key => $value) {
        $description = json_decode($data[$key]["rm_description"]);
        $desc = $description->description;
        $carouselSlides[$key] = ($key === 0) ? array(
            "img-url" => Url::GetReference("uploads/rooms/" . $data[$key]["rm_pictures"]),
            "active" => true,
            "has-description" => true,
            "description-type" => "card-with-buttons",
            "description" => array(
                "carousel-description-justify" => "end mb-3 mx-3",
                "carousel-description-cols" => "col-md-4",
                "carousel-description-heading" => $data[$key]["rm_name"],
                "carousel-description-heading-color" => "primary",
                "carousel-description" => $desc,
                "carousel-description-price" => number_format($data[$key]["rm_price"]) . " Ksh",
                "carousel-description-price-color" => "dark",
                "carousel-description-billing" => "per night",
                "carousel-description-billing-class-names" => "mx-2 mt-2",
                "carousel-description-status" => $data[$key]["rm_status"],
                "carousel-description-status-cols" => "col-md-4",
                "carousel-description-status-button-color" => "success",
                "carousel-description-buttons" => array(
                    "Book Now &raquo;",
                    "Find out more &raquo;"
                ),
                "carousel-description-button-links" => array(
                    "Book Now &raquo;" => "client-booking?roomid=" . $data[$key]["rm_id"],
                    "Find out more &raquo;" => $data[$key]["rm_id"],
                ),
                "carousel-description-button-class-names" => array(
                    "Book Now &raquo;" => "btn btn-primary",
                    "Find out more &raquo;" => "btn btn-secondary mx-3",
                ),
                "carousel-description-button-cols" => "col-md-8",
                "carousel-description-button-display" => "d-flex",
                "carousel-description-button-justify" => "end",
            )
        ) : array(
                "img-url" => Url::GetReference("uploads/rooms/" . $data[$key]["rm_pictures"]),
                "active" => false,
                "has-description" => true,
                "description-type" => "card-with-buttons",
                "description" => array(
                    "carousel-description-justify" => "end mb-3 mx-3",
                    "carousel-description-cols" => "col-md-4",
                    "carousel-description-heading" => $data[$key]["rm_name"],
                    "carousel-description-heading-color" => "primary",
                    "carousel-description" => $desc,
                    "carousel-description-price" => number_format($data[$key]["rm_price"]) . " Ksh",
                    "carousel-description-price-color" => "dark",
                    "carousel-description-billing" => "per night",
                    "carousel-description-billing-class-names" => "mx-2 mt-2",
                    "carousel-description-status" => $data[$key]["rm_status"],
                    "carousel-description-status-cols" => "col-md-4",
                    "carousel-description-status-button-color" => "success",
                    "carousel-description-buttons" => array(
                        "Book Now &raquo;",
                        "Find out more &raquo;"
                    ),
                    "carousel-description-button-links" => array(
                        "Book Now &raquo;" => "client-booking?roomid=" . $data[$key]["rm_id"],
                        "Find out more &raquo;" => $data[$key]["rm_id"],
                    ),
                    "carousel-description-button-class-names" => array(
                        "Book Now &raquo;" => "btn btn-primary",
                        "Find out more &raquo;" => "btn btn-secondary mx-3",
                    ),
                    "carousel-description-button-cols" => "col-md-8",
                    "carousel-description-button-display" => "d-flex",
                    "carousel-description-button-justify" => "end",
                )
            );


        array_push($slideItems, $carouselSlides[$key]);
    }



    $slideItems = Formatter::run()->formatArray(array_values($slideItems), $keys);



    $carousel = new Carousel;
    $carousel->setCarouselId("staffRegistration");
    $carousel->setCarouselSlides($keys);
    $carousel->setCarouselItems($slideItems);
    $carousel->runSetup();
}