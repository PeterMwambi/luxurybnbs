<?php

namespace Models\Components;

use Exception;
use Models\Core\App\Helpers\Formatter;

class CardComponent
{

    /**
     * Summary of cardSizing
     * @var string
     */
    private $cardSizing = "";

    /**
     * Summary of cardHeading
     * @var string
     */
    private $cardHeading = "";

    /**
     * Summary of cardHeadingSizing
     * @var string
     */
    private $cardHeadingSizing = "";

    /**
     * Summary of cardBodyContent
     * @var array
     */
    private $cardBodyContent = array();


    /**
     * Summary of cardBodySizing
     * @var string
     */
    private $cardBodySizing = "";


    /**
     * Summary of type
     * @var string
     */
    private $type = "";


    /**
     * Summary of hasDiv
     * @var bool
     */
    private $hasDiv = false;


    /**
     * Summary of DivContent
     * @var array
     */
    private $divContent = array();

    /**
     * Summary of DivClasses
     * @var string
     */
    private $divClasses = "";

    /**
     * Summary of profileCardIcon
     * @var array
     */
    private $profileCardIcons = array();

    /**
     * Summary of profileCardItems
     * @var array
     */
    private $profileCardItems = array();

    /**
     * Summary of profileCardParagraphs
     * @var array
     */
    private $profileCardParagraphs = array();

    /**
     * Summary of profileCardButtons
     * @var array
     */
    private $profileCardButtons = array();

    /**
     * Summary of profileCardButtonLinks
     * @var array
     */
    private $profileCardButtonLinks = array();

    /**
     * Summary of profileCardButtonProperties
     * @var array
     */
    private $profileCardButtonProperties = array();

    /**
     * Summary of itemCountHeading
     * @var string
     */
    private $itemCountHeading = "";

    /**
     * Summary of itemCount
     * @var int
     */
    private $itemCount = 0;






    /**
     * Summary of cardSizing
     * @return string
     */
    private function getCardSizing()
    {
        return $this->cardSizing;
    }

    /**
     * Summary of cardSizing
     * @param string $cardSizing Summary of cardSizing
     * @return self
     */
    public function setCardSizing(string $cardSizing): self
    {
        $this->cardSizing = $cardSizing;
        return $this;
    }

    /**
     * Summary of cardHeading
     * @return string
     */
    private function getCardHeading()
    {
        return $this->cardHeading;
    }

    /**
     * Summary of cardHeading
     * @param string $cardHeading Summary of cardHeading
     * @return self
     */
    public function setCardHeading(string $cardHeading): self
    {
        $this->cardHeading = $cardHeading;
        return $this;
    }

    /**
     * Summary of cardHeadingSizing
     * @return string
     */
    private function getCardHeadingSizing()
    {
        return $this->cardHeadingSizing;
    }

    /**
     * Summary of cardHeadingSizing
     * @param string $cardHeadingSizing Summary of cardHeadingSizing
     * @return self
     */
    public function setCardHeadingSizing(string $cardHeadingSizing): self
    {
        $this->cardHeadingSizing = $cardHeadingSizing;
        return $this;
    }

    /**
     * Summary of cardBodyContent
     * @return array
     */
    private function getCardBodyContent()
    {
        return $this->cardBodyContent;
    }

    /**
     * Summary of cardBodyContent
     * @param array $cardBodyContent Summary of cardBodyContent
     * @return self
     */
    public function setCardBodyContent(array $cardBodyContent): self
    {
        $this->cardBodyContent = $cardBodyContent;
        return $this;
    }

    /**
     * Summary of cardBodySizing
     * @return string
     */
    private function getCardBodySizing()
    {
        return $this->cardBodySizing;
    }

    /**
     * Summary of cardBodySizing
     * @param string $cardBodySizing Summary of cardBodySizing
     * @return self
     */
    public function setCardBodySizing($cardBodySizing): self
    {
        $this->cardBodySizing = $cardBodySizing;
        return $this;
    }

    /**
     * Summary of type
     * @return string
     */
    private function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Card type is required");
        }
    }

    /**
     * Summary of type
     * @param string $type Summary of type
     * @return self
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function hasDiv()
    {
        return $this->hasDiv;
    }

    /**
     * @param mixed $hasDiv
     * @return self
     */
    public function setHasDiv(bool $hasDiv): self
    {
        $this->hasDiv = $hasDiv;
        return $this;
    }

    /**
     * Summary of DivContent
     * @return array
     */
    private function getDivContent()
    {
        return $this->divContent;
    }

    /**
     * Summary of DivContent
     * @param array $DivContent Summary of DivContent
     * @return self
     */
    public function setDivContent(array $DivContent): self
    {
        $this->divContent = $DivContent;
        return $this;
    }

    /**
     * Summary of DivClasses
     * @return string
     */
    private function getDivClasses()
    {
        return $this->divClasses;
    }

    /**
     * Summary of DivClasses
     * @param string $DivClasses Summary of DivClasses
     * @return self
     */
    public function setDivClasses(string $DivClasses): self
    {
        $this->divClasses = $DivClasses;
        return $this;
    }

    /**
     * Summary of profileCardIcon
     * @return array
     */
    private function getProfileCardIcons()
    {
        return $this->profileCardIcons;
    }

    /**
     * Summary of profileCardIcon
     * @param array $profileCardIcons Summary of profileCardIcon
     * @return self
     */
    public function setProfileCardIcons($profileCardIcons): self
    {
        $this->profileCardIcons = $profileCardIcons;
        return $this;
    }

    /**
     * Summary of profileCardItems
     * @return array
     */
    private function getProfileCardItems()
    {
        return $this->profileCardItems;
    }

    /**
     * Summary of profileCardItems
     * @param array $profileCardItems Summary of profileCardItems
     * @return self
     */
    public function setProfileCardItems($profileCardItems): self
    {
        $this->profileCardItems = $profileCardItems;
        return $this;
    }

    /**
     * Summary of profileCardParagraphs
     * @return array
     */
    private function getProfileCardParagraphs()
    {
        return $this->profileCardParagraphs;
    }

    /**
     * Summary of profileCardParagraphs
     * @param array $profileCardParagraphs Summary of profileCardParagraphs
     * @return self
     */
    public function setProfileCardParagraphs($profileCardParagraphs): self
    {
        $this->profileCardParagraphs = $profileCardParagraphs;
        return $this;
    }

    /**
     * Summary of profileCardButtons
     * @return array
     */
    private function getProfileCardButtons()
    {
        return $this->profileCardButtons;
    }

    /**
     * Summary of profileCardButtons
     * @param array $profileCardButtons Summary of profileCardButtons
     * @return self
     */
    public function setProfileCardButtons($profileCardButtons): self
    {
        $this->profileCardButtons = $profileCardButtons;
        return $this;
    }

    /**
     * Summary of profileCardButtonLinks
     * @return array
     */
    private function getProfileCardButtonLinks()
    {
        return $this->profileCardButtonLinks;
    }

    /**
     * Summary of profileCardButtonLinks
     * @param array $profileCardButtonLinks Summary of profileCardButtonLinks
     * @return self
     */
    public function setProfileCardButtonLinks($profileCardButtonLinks): self
    {
        $this->profileCardButtonLinks = $profileCardButtonLinks;
        return $this;
    }

    /**
     * Summary of itemCountHeading
     * @return string
     */
    private function getItemCountHeading()
    {
        return $this->itemCountHeading;
    }

    /**
     * Summary of itemCountHeading
     * @param string $itemCountHeading Summary of itemCountHeading
     * @return self
     */
    public function setItemCountHeading($itemCountHeading): self
    {
        $this->itemCountHeading = $itemCountHeading;
        return $this;
    }

    /**
     * Summary of itemCount
     * @return int
     */
    private function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * Summary of itemCount
     * @param int $itemCount Summary of itemCount
     * @return self
     */
    public function setItemCount($itemCount): self
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * Summary of profileCardButtonProperties
     * @return array
     */
    private function getProfileCardButtonProperties()
    {
        return $this->profileCardButtonProperties;
    }

    /**
     * Summary of profileCardButtonProperties
     * @param array $profileCardButtonProperties Summary of profileCardButtonProperties
     * @return self
     */
    public function setProfileCardButtonProperties($profileCardButtonProperties): self
    {
        $this->profileCardButtonProperties = $profileCardButtonProperties;
        return $this;
    }


    private function loopCardBodyItems()
    {
        if (count($this->getCardBodyContent())) {
            foreach ($this->getCardBodyContent() as $content) {
                if (function_exists($content)) {
                    $content();
                } else {
                    echo $content;
                }
            }
        }
        return;
    }

    private function loopDivContent()
    {
        if ($this->hasDiv()) {
            echo '<div class="' . $this->getDivClasses() . '">';
            foreach ($this->getDivContent() as $content) {
                if (function_exists($content)) {
                    $content();
                } else {
                    echo $content;
                }
            }
            echo '</div>';
        }
        return;
    }


    private function defaultCard()
    {
        echo '<div class="card ' . $this->getCardSizing() . '">';
        if (!empty($this->getCardHeading())) {
            echo '<div class="card-heading ' . $this->getCardHeadingSizing() . '">
                    <h3>' . $this->getCardHeading() . '</h3>
                </div>
            ';
        }
        echo '<div class="card-body ' . $this->getCardBodySizing() . '">';
        $this->loopCardBodyItems();
        $this->loopDivContent();
        echo '
            </div>
        </div>';
    }


    private function profileCard()
    {
        foreach ($this->getProfileCardItems() as $item):
            echo '
            <div class="col-md-4 mt-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <h5 class="mt-3 text-primary">';
            if (Formatter::verifyArrayKey($item, $this->getProfileCardIcons())):
                echo '<img src="' . $this->getProfileCardIcons()[$item] . '" class="img-fluid small"> ';
            endif;
            echo $item;
            echo '</h5>
                        </div>
                            <div class="col-md-8">
                                <div class="d-flex justify-content-end">
                                    <h6 class="text-muted">' . $this->getItemCountHeading() . ' : ' . $this->getItemCount() . '</h6>
                                </div>
                            </div>
                        </div>';
            if (Formatter::verifyArrayKey($item, $this->getProfileCardParagraphs())) {
                echo '<div>';
                echo '<p>' . $this->getProfileCardParagraphs()[$item] . '</p>';
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="card-footer bg-light">';
            if (count($this->getProfileCardButtons())):
                echo '<div class="d-flex justify-content-start">';
                if (Formatter::verifyArrayKey($item, $this->getProfileCardButtons())):
                    foreach ($this->getProfileCardButtons()[$item] as $button):
                        echo '<a class="' . $this->getProfileCardButtonProperties()[$button] . '" href="' . $this->getProfileCardButtonLinks()[$button] . '">';
                        if (Formatter::verifyArrayKey($button, $this->getProfileCardIcons())):
                            echo '<img src="' . $this->getProfileCardIcons()[$button] . '" class="img-fluid small">' . $button . '</a>';
                        endif;
                    endforeach;
                endif;
                echo '</div>';
            endif;
            echo '</div>
                </div>
            </div>';
        endforeach;
    }


    protected function render()
    {
        return match ($this->getType()) {
            "default" => $this->defaultCard(),
            "profile-card" => $this->profileCard()
        };
    }


}