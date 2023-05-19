<?php

namespace Models\Components;

use Exception;

class CarouselDescriptionComponent
{

    private $carouselDescriptionType;

    private $carouselDescriptionHeading = "";

    private $carouselDescriptionHeadingColor = "";

    private $carouselDescription = "";

    private $carouselDescriptionClassNames = "";

    private $carouselDescriptionJustify = "";

    private $carouselDescriptionCols = "";

    private $carouselDescriptionPrice = "";

    private $carouselDescriptionPriceColor = "";

    private $carouselDescriptionBilling = "";

    private $carouselDescriptionBillingClassnames = "";

    private $carouselDescriptionStatus = "";

    private $carouselDescriptionStatusButtonColor = "";

    private $carouselDescriptionButtons = array();

    private $carouselDescriptionButtonLinks = array();

    private $carouselDescriptionButtonClassNames = array();


    private $carouselDescriptionStatusCols = "";

    private $carouselDescriptionButtonCols = "";

    private $carouselDescriptionButtonDisplay = "";

    private $carouselDescriptionButtonJustify = "";






    /**
     * @return string
     */
    private function getCarouselDescriptionHeading()
    {
        return $this->carouselDescriptionHeading;
    }

    /**
     * @param string $carouselDescriptionHeading 
     * @return self
     */
    protected function setCarouselDescriptionHeading(string $carouselDescriptionHeading): self
    {
        $this->carouselDescriptionHeading = $carouselDescriptionHeading;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionHeadingColor()
    {
        return $this->carouselDescriptionHeadingColor;
    }

    /**
     * @param string $carouselDescriptionHeadingColor 
     * @return self
     */
    protected function setCarouselDescriptionHeadingColor(string $carouselDescriptionHeadingColor): self
    {
        $this->carouselDescriptionHeadingColor = $carouselDescriptionHeadingColor;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getCarouselDescription()
    {
        return $this->carouselDescription;
    }

    /**
     * @param mixed $carouselDescription 
     * @return self
     */
    protected function setCarouselDescription($carouselDescription): self
    {
        $this->carouselDescription = $carouselDescription;
        return $this;
    }


    /**
     * @return mixed
     */
    private function getCarouselDescriptionClassNames()
    {
        return $this->carouselDescriptionClassNames;
    }

    /**
     * @param mixed $carouselDescriptionClassNames 
     * @return self
     */
    public function setCarouselDescriptionClassNames($carouselDescriptionClassNames): self
    {
        $this->carouselDescriptionClassNames = $carouselDescriptionClassNames;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionJustify()
    {
        return $this->carouselDescriptionJustify;
    }

    /**
     * @param string $carouselDescriptionJustify 
     * @return self
     */
    protected function setCarouselDescriptionJustify(string $carouselDescriptionJustify): self
    {
        $this->carouselDescriptionJustify = $carouselDescriptionJustify;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionCols()
    {
        return $this->carouselDescriptionCols;
    }

    /**
     * @param string $carouselDescriptionCols 
     * @return self
     */
    protected function setCarouselDescriptionCols(string $carouselDescriptionCols): self
    {
        $this->carouselDescriptionCols = $carouselDescriptionCols;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionPrice()
    {
        return $this->carouselDescriptionPrice;
    }

    /**
     * @param string $carouselDescriptionPrice 
     * @return self
     */
    protected function setCarouselDescriptionPrice(string $carouselDescriptionPrice): self
    {
        $this->carouselDescriptionPrice = $carouselDescriptionPrice;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionPriceColor()
    {
        return $this->carouselDescriptionPriceColor;
    }

    /**
     * @param string $carouselDescriptionPriceColor 
     * @return self
     */
    protected function setCarouselDescriptionPriceColor(string $carouselDescriptionPriceColor): self
    {
        $this->carouselDescriptionPriceColor = $carouselDescriptionPriceColor;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionBilling()
    {
        return $this->carouselDescriptionBilling;
    }

    /**
     * @param string $carouselDescriptionBilling 
     * @return self
     */
    protected function setCarouselDescriptionBilling(string $carouselDescriptionBilling): self
    {
        $this->carouselDescriptionBilling = $carouselDescriptionBilling;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionBillingClassnames()
    {
        return $this->carouselDescriptionBillingClassnames;
    }

    /**
     * @param string $carouselDescriptionBillingClassnames 
     * @return self
     */
    protected function setCarouselDescriptionBillingClassnames(string $carouselDescriptionBillingClassnames): self
    {
        $this->carouselDescriptionBillingClassnames = $carouselDescriptionBillingClassnames;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionStatus()
    {
        return $this->carouselDescriptionStatus;
    }

    /**
     * @param string $carouselDescriptionStatus 
     * @return self
     */
    protected function setCarouselDescriptionStatus(string $carouselDescriptionStatus): self
    {
        $this->carouselDescriptionStatus = $carouselDescriptionStatus;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionStatusButtonColor()
    {
        return $this->carouselDescriptionStatusButtonColor;
    }

    /**
     * @param string $carouselDescriptionStatusButtonColor 
     * @return self
     */
    protected function setCarouselDescriptionStatusButtonColor(string $carouselDescriptionStatusButtonColor): self
    {
        $this->carouselDescriptionStatusButtonColor = $carouselDescriptionStatusButtonColor;
        return $this;
    }

    /**
     * @return array
     */
    private function getCarouselDescriptionButtons()
    {
        if (count($this->carouselDescriptionButtons)) {
            return $this->carouselDescriptionButtons;
        } else {
            throw new Exception("Warning: Carousel Description buttons have not been defined");
        }
    }

    /**
     * @param array $carouselDescriptionButtons 
     * @return self
     */
    protected function setCarouselDescriptionButtons(array $carouselDescriptionButtons): self
    {
        $this->carouselDescriptionButtons = $carouselDescriptionButtons;
        return $this;
    }

    /**
     * @return array
     */
    private function getCarouselDescriptionButtonLinks()
    {
        if (count($this->carouselDescriptionButtonLinks)) {
            return $this->carouselDescriptionButtonLinks;
        } else {
            throw new Exception("Warning: Carousel description button links have not been defined");
        }
    }

    /**
     * @param array $carouselDescriptionButtonLinks 
     * @return self
     */
    protected function setCarouselDescriptionButtonLinks(array $carouselDescriptionButtonLinks): self
    {
        $this->carouselDescriptionButtonLinks = $carouselDescriptionButtonLinks;
        return $this;
    }

    /**
     * @return array
     */
    private function getCarouselDescriptionButtonClassNames()
    {
        if (count($this->carouselDescriptionButtonClassNames)) {
            return $this->carouselDescriptionButtonClassNames;
        } else {
            throw new Exception("Warning: Carousel description button class names have not been defined");
        }
    }

    /**
     * @param array $carouselDescriptionButtonClassNames 
     * @return self
     */
    protected function setCarouselDescriptionButtonClassNames(array $carouselDescriptionButtonClassNames): self
    {
        $this->carouselDescriptionButtonClassNames = $carouselDescriptionButtonClassNames;
        return $this;
    }


    /**
     * @return string
     */
    private function getCarouselDescriptionStatusCols()
    {
        return $this->carouselDescriptionStatusCols;
    }

    /**
     * @param string $carouselDescriptionStatusCols 
     * @return self
     */
    public function setCarouselDescriptionStatusCols(string $carouselDescriptionStatusCols): self
    {
        $this->carouselDescriptionStatusCols = $carouselDescriptionStatusCols;
        return $this;
    }

    /**
     * @return string
     */
    private function getCarouselDescriptionButtonCols()
    {
        return $this->carouselDescriptionButtonCols;
    }

    /**
     * @param string $carouselDescriptionButtonCols 
     * @return self
     */
    public function setCarouselDescriptionButtonCols(string $carouselDescriptionButtonCols): self
    {
        $this->carouselDescriptionButtonCols = $carouselDescriptionButtonCols;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getCarouselDescriptionButtonDisplay()
    {
        return $this->carouselDescriptionButtonDisplay;
    }

    /**
     * @param mixed $carouselDescriptionButtonDisplay 
     * @return self
     */
    public function setCarouselDescriptionButtonDisplay(string $carouselDescriptionButtonDisplay): self
    {
        $this->carouselDescriptionButtonDisplay = $carouselDescriptionButtonDisplay;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getCarouselDescriptionButtonJustify()
    {
        return $this->carouselDescriptionButtonJustify;
    }

    /**
     * @param mixed $carouselDescriptionButtonJustify 
     * @return self
     */
    public function setCarouselDescriptionButtonJustify($carouselDescriptionButtonJustify): self
    {
        $this->carouselDescriptionButtonJustify = $carouselDescriptionButtonJustify;
        return $this;
    }


    private function loopCarouselDescriptionButtons()
    {
        foreach ($this->getCarouselDescriptionButtons() as $button) {
            echo
                ' <a class="' . $this->getCarouselDescriptionButtonClassNames()[$button] . '" href="' . $this->getCarouselDescriptionButtonLinks()[$button] . '">' . $button . '</a>';
        }
        return $this;
    }



    private function carouselDescriptionCardWithButtons()
    {
        echo
            '<div class="carousel-desc">
                <div class="d-flex justify-content-' . $this->getcarouselDescriptionJustify() . '">
                <div class="' . $this->getCarouselDescriptionCols() . '">
                <div class="card">
                        <div class="card-body">';
        if (!empty($this->getCarouselDescriptionHeading())) {
            echo '
                        <!-- Carousel description Heading -->
                        <h4 class="text-' . $this->getCarouselDescriptionHeadingColor() . '">' . $this->getCarouselDescriptionHeading() . '</h4>';
        }

        if (!empty($this->getCarouselDescription())) {
            echo '
                            <!-- Carousel description -->
                            <p class="' . $this->getCarouselDescriptionClassNames() . '">' . $this->getCarouselDescription() . '</p>';
        }

        if (!empty($this->getCarouselDescriptionPrice()) || !empty($this->getCarouselDescriptionBilling())) {
            echo '
                            <div class="d-flex">';
            if (!empty($this->getCarouselDescriptionPrice())) {
                echo ' 
                            <!-- Carousel description Price -->
                                <h4 class="text-' . $this->getCarouselDescriptionPriceColor() . '"><strong>' . $this->getCarouselDescriptionPrice() . '</strong></h4>';
            }
            if (!empty($this->getCarouselDescriptionBilling())) {
                echo '
                                <!-- Carousel description Billing -->
                                <small class="' . $this->getCarouselDescriptionBillingClassnames() . '">' . $this->getCarouselDescriptionBilling() . '</small>';

            }
            echo '</div> ';
        }

        if (!empty($this->getCarouselDescriptionStatus()) || count($this->getCarouselDescriptionButtons())) {
            echo '
                            <div class="row">';
            if (!empty($this->getCarouselDescriptionStatus())) {
                echo '
                                <div class="' . $this->getCarouselDescriptionStatusCols() . '">
                                    <!-- Carousel description status -->
                                    <button type="button" class="btn btn-sm btn-outline-' . $this->getCarouselDescriptionStatusButtonColor() . ' mt-1">' . $this->getCarouselDescriptionStatus() . '</button>
                                </div>';
            }
            if (count($this->getCarouselDescriptionButtons())) {
                echo '
                                <div class="' . $this->getCarouselDescriptionButtonCols() . '">
                            <!-- Carousel description buttons -->
                                    <div class="' . $this->getCarouselDescriptionButtonDisplay() . ' justify-content-' . $this->getCarouselDescriptionButtonJustify() . '">
                                        <!-- Carousel description button links -->';
                $this->loopCarouselDescriptionButtons();
                echo '</div>';
            }
            echo '
                                </div>
                            </div> ';

        }
        echo '
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ';
    }


    protected function render()
    {
        return match ($this->getCarouselDescriptionType()) {
            "card-with-buttons" => $this->carouselDescriptionCardWithButtons(),
        };
    }





    /**
     * @return mixed
     */
    private function getCarouselDescriptionType()
    {
        if (!empty($this->carouselDescriptionType)) {
            return $this->carouselDescriptionType;
        } else {
            throw new Exception("Warning: Carousel description type has not been defined");
        }
    }

    /**
     * @param mixed $carouselDescriptionType 
     * @return self
     */
    protected function setCarouselDescriptionType($carouselDescriptionType): self
    {
        $this->carouselDescriptionType = $carouselDescriptionType;
        return $this;
    }
}