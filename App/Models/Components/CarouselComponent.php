<?php

namespace Models\Components;

use Exception;

class CarouselComponent extends CarouselDescriptionComponent
{
    private $carouselId = "";

    private $carouselItemCounter = 0;

    private $carouselSlides = array();

    private $carouselItems = array();

    private $hasDescription = false;

    private $carouselDescriptionItems = array();

    private $active = false;



    /**
     * @return string
     */
    protected function getCarouselId()
    {
        if (!empty($this->carouselId)) {
            return $this->carouselId;
        } else {
            throw new Exception("Warning: Carousel id has not been defined");
        }
    }

    /**
     * @param string $carouselId 
     * @return self
     */
    public function setCarouselId(string $carouselId): self
    {
        $this->carouselId = $carouselId;
        return $this;
    }

    /**
     * @return array
     */
    protected function getCarouselSlides()
    {
        if (count($this->carouselSlides)) {
            return $this->carouselSlides;
        } else {
            throw new Exception("Warning: Carousel slides have not been defined");
        }
    }

    /**
     * @param array $carouselSlides 
     * @return self
     */
    public function setCarouselSlides(array $carouselSlides): self
    {
        $this->carouselSlides = $carouselSlides;
        return $this;
    }

    /**
     * @return array
     */
    protected function getCarouselItems()
    {
        return $this->carouselItems;
    }

    /**
     * @param array $carouselItems 
     * @return self
     */
    public function setCarouselItems(array $carouselItems): self
    {
        $this->carouselItems = $carouselItems;
        return $this;
    }
    /**
     * @return bool
     */
    protected function hasDescription()
    {
        if (is_bool($this->hasDescription)) {
            return $this->hasDescription;
        } else {
            throw new Exception("Warning: Carousel verify description has not been defined");
        }
    }

    /**
     * @param bool $hasDescription 
     * @return self
     */
    protected function setHasDescription(bool $hasDescription): self
    {
        $this->hasDescription = $hasDescription;
        return $this;
    }

    /**
     * @return bool
     */
    protected function isActive()
    {
        if (is_bool($this->active)) {
            return $this->active;
        } else {
            throw new Exception("Warning: Active status has not been set");
        }
    }

    /**
     * @param bool $active 
     * @return self
     */
    protected function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Summary of passCarouselDescriptionParams
     * @param array $item
     * @return void
     */


    /**
     * @return mixed
     */
    private function getCarouselDescriptionItems()
    {
        if (count($this->carouselDescriptionItems)) {
            return $this->carouselDescriptionItems;
        } else {
            throw new Exception("Warning: Carousel description items have not been set");
        }
    }

    /**
     * @param mixed $carouselDescriptionItems 
     * @return self
     */
    private function setCarouselDescriptionItems(array $carouselDescriptionItems): self
    {
        $this->carouselDescriptionItems = $carouselDescriptionItems;
        return $this;
    }

    /**
     * Summary of clearCarouselDescriptionItems
     * @return void
     */
    private function clearCarouselDescriptionItems()
    {
        $this->carouselDescriptionItems = array();
    }

    /**
     * Summary of passToCarouselDescriptionComponent
     * @param array $items
     * @return CarouselComponent
     */
    private function passToCarouselDescriptionComponent()
    {
        foreach (array_keys($this->getCarouselDescriptionItems()) as $item) {
            $key = str_replace("-", "", $item);
            $method = "set" . $key;
            if (method_exists($this, $method)) {
                parent::$method($this->getCarouselDescriptionItems()[$item]);
            }
        }
        return $this;
    }
    /**
     * Summary of loopCarouselSlides
     * @return CarouselComponent
     */
    private function loopCarouselSlides()
    {
        foreach ($this->getCarouselSlides() as $slide) {
            if ($this->carouselItemCounter === 0) {
                $this->setActive(true);
                if ($this->isActive()) {
                    echo
                        '<li data-bs-target="#' . $this->getCarouselId() . '" data-bs-slide-to="' . $this->carouselItemCounter . '" class="active" aria-current="true"
                        aria-label="' . $slide . '"></li>';
                }
            } else {
                echo
                    '<li data-bs-target="#' . $this->getCarouselId() . '" data-bs-slide-to="' . $this->carouselItemCounter . '" aria-label="' . $slide . '"></li>';
            }
            $this->carouselItemCounter++;
        }
        return $this;
    }


    /**
     * Summary of renderDescription
     * @param array $description
     * @return void
     */
    private function renderDescription(array $description)
    {
        $this->clearCarouselDescriptionItems();
        $this->setCarouselDescriptionItems($description);
        $this->passToCarouselDescriptionComponent();
        echo ' <!-- Has description: true -->
                            <!-- Carousel Item Description -->';
        parent::render();
    }



    /**
     * Summary of loopCarouselItems
     * @return CarouselComponent
     */
    private function loopCarouselItems()
    {
        foreach ($this->getCarouselSlides() as $slide) {
            $item = $this->getCarouselItems()[$slide];
            $this->setHasDescription($item["has-description"]);
            $this->setActive($item["active"]);
            if ($this->isActive()) {
                echo '<div class="carousel-item active">
                         <!-- Carousel item active -->
                            <img src="' . $item["img-url"] . '" class="carousel-image resize" alt="' . $slide . '">';
                if ($this->hasDescription()) {
                    $this->setCarouselDescriptionType($item["description-type"]);
                    $this->renderDescription($item["description"]);
                }
                echo '</div>';
            } else {
                echo '<!-- Carousel Item -->
                        <div class="carousel-item">
                            <!-- Carousel Image -->';
                echo '<img src="' . $item["img-url"] . '" class="carousel-image resize" alt="' . $slide . '">';
                if ($this->hasDescription()) {
                    $this->setCarouselDescriptionType($item["description-type"]);
                    $this->renderDescription($item["description"]);
                } else {
                    echo '<!-- Has description: false -->';
                }
                echo '</div>';
            }
        }
        return $this;
    }


    /**
     * Summary of render
     * @return CarouselComponent
     */
    protected function render()
    {
        echo '
        <!-- Carousel Id -->
        <div id="' . $this->getCarouselId() . '" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">';
        $this->loopCarouselSlides();
        echo '</ol>';
        echo '<div class="carousel-inner" role="listbox">';
        $this->loopCarouselItems();
        echo '</div>';
        echo '
         <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#' . $this->getCarouselId() . '" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#' . $this->getCarouselId() . '" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        ';
        echo '</div>';
        return $this;
    }

}