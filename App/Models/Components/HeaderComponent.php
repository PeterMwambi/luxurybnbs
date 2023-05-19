<?php


namespace Models\Components;

use Exception;

class HeaderComponent
{

    /**
     * Summary of heading
     * @var string
     */
    private $heading = "";

    /**
     * Summary of headingClasses
     * @var string
     */
    private $headingClasses = "";

    /**
     * Summary of date
     * @var string
     */
    private $date = "";

    /**
     * Summary of loginInfo
     * @var string
     */
    private $loginInfo = "";

    /**
     * Summary of welcomeText
     * @var string
     */
    private $welcomeText = "";

    /**
     * Summary of justifyHeading
     * @var string
     */
    private $justifyHeading = "";

    /**
     * Summary of headingSizing
     * @var string
     */
    private $headingSizing = "";

    /**
     * Summary of helpText
     * @var string
     */
    private $helpText = "";

    /**
     * Summary of justifyHelpText
     * @var string
     */
    private $justifyHelpText = "";

    /**
     * Summary of helpTextSizing
     * @var string
     */
    private $helpTextSizing = "";

    /**
     * Summary of helpTextClasses
     * @var string
     */
    private $helpTextClasses = "";

    /**
     * Summary of paragraph
     * @var string
     */
    private $paragraph = "";

    /**
     * Summary of itemCount
     * @var string
     */
    private $itemCount = "";

    /**
     * Summary of itemCountHeading
     * @var string
     */
    private $itemCountHeading = "";

    /**
     * Summary of type
     * @var mixed
     */
    private $type = "";

    /**
     * Summary of headingIcon
     * @var string
     */
    private $headingIcon = "";


    /**
     * Summary of hasButton
     * @var bool
     */
    private $hasButton = false;

    /**
     * Summary of buttonContent
     * @var array
     */
    private $buttonContent = array();

    /**
     * Summary of buttonContentLinks
     * @var array
     */
    private $buttonContentLinks = array();

    /**
     * Summary of buttonContentClasses
     * @var array
     */
    private $buttonContentClasses = array();
    /**
     * @return string
     */
    protected function getHeading()
    {
        if (!empty($this->heading)) {
            return $this->heading;
        } else {
            throw new Exception("Warning: Form header heading has not been defined");
        }
    }

    /**
     * @param string $heading 
     * @return self
     */
    public function setHeading(string $heading): self
    {
        $this->heading = $heading;
        return $this;
    }


    /**
     * @return string
     */
    protected function getHeadingClasses()
    {
        if (!empty($this->headingClasses)) {
            return $this->headingClasses;
        } else {
            throw new Exception("Warning: Form header heading classes have not been defined");
        }
    }

    /**
     * @param mixed $headingClasses 
     * @return self
     */
    public function setHeadingClasses(string $headingClasses): self
    {
        $this->headingClasses = $headingClasses;
        return $this;
    }

    /**
     * @return string
     */
    protected function getJustifyHeading()
    {
        if (!empty($this->justifyHeading)) {
            return $this->justifyHeading;
        } else {
            throw new Exception("Warning: Form header justify heading has not been defined");
        }
    }

    /**
     * @param string $justifyHeading 
     * @return self
     */
    public function setJustifyHeading(string $justifyHeading): self
    {
        $this->justifyHeading = $justifyHeading;
        return $this;
    }

    /**
     * @return string
     */
    protected function getHeadingSizing()
    {
        if (!empty($this->headingSizing)) {
            return $this->headingSizing;
        } else {
            throw new Exception("Warning: Form header heading sizing has not been defined");
        }
    }

    /**
     * @param string $headingSizing 
     * @return self
     */
    public function setHeadingSizing(string $headingSizing): self
    {
        $this->headingSizing = $headingSizing;
        return $this;
    }

    /**
     * @return string
     */
    protected function getHelpText()
    {
        if (!empty($this->helpText)) {
            return $this->helpText;
        } else {
            throw new Exception("Warning: Form header help text has not been defined");
        }
    }

    /**
     * @param string $helpText 
     * @return self
     */
    public function setHelpText(string $helpText): self
    {
        $this->helpText = $helpText;
        return $this;
    }

    /**
     * @return string
     */
    protected function getJustifyHelpText()
    {
        if (!empty($this->helpText)) {
            return $this->justifyHelpText;
        } else {
            throw new Exception("Warning: Form header help text has not been defined");
        }
    }

    /**
     * @param string $justifyHelpText 
     * @return self
     */
    public function setJustifyHelpText(string $justifyHelpText): self
    {
        $this->justifyHelpText = $justifyHelpText;
        return $this;
    }

    /**
     * @return string
     */
    protected function getHelpTextSizing()
    {
        if (!empty($this->helpTextSizing)) {
            return $this->helpTextSizing;
        } else {
            throw new Exception("Warning: Form header help text sizing has not been defined");
        }
    }

    /**
     * @param mixed $helpTextSizing 
     * @return self
     */
    public function setHelpTextSizing($helpTextSizing): self
    {
        $this->helpTextSizing = $helpTextSizing;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getHelpTextClasses()
    {
        if (!empty($this->helpTextClasses)) {
            return $this->helpTextClasses;
        } else {
            throw new Exception("Warning: Form header help text classes have not been defined");
        }
    }

    /**
     * @param mixed $helpTextClasses 
     * @return self
     */
    public function setHelpTextClasses($helpTextClasses): self
    {
        $this->helpTextClasses = $helpTextClasses;
        return $this;
    }


    /**
     * Summary of paragraph
     * @return string
     */
    protected function getParagraph()
    {
        return $this->paragraph;
    }

    /**
     * Summary of paragraph
     * @param string $paragraph Summary of paragraph
     * @return self
     */
    public function setParagraph(string $paragraph): self
    {
        $this->paragraph = $paragraph;
        return $this;
    }

    /**
     * Summary of itemCount
     * @return string
     */
    protected function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * Summary of itemCount
     * @param string $itemCount Summary of itemCount
     * @return self
     */
    public function setItemCount(string $itemCount): self
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * Summary of itemCountHeading
     * @return string
     */
    protected function getItemCountHeading()
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
     * Summary of type
     * @return mixed
     */
    protected function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Type has not been defined");
        }
    }

    /**
     * Summary of type
     * @param mixed $type Summary of type
     * @return self
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Summary of welcomeText
     * @return string
     */
    private function getWelcomeText()
    {
        return $this->welcomeText;
    }

    /**
     * Summary of welcomeText
     * @param string $welcomeText Summary of welcomeText
     * @return self
     */
    public function setWelcomeText(string $welcomeText): self
    {
        $this->welcomeText = $welcomeText;
        return $this;
    }

    /**
     * Summary of date
     * @return string
     */
    private function getDate()
    {
        return $this->date;
    }

    /**
     * Summary of date
     * @param string $date Summary of date
     * @return self
     */
    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Summary of loginInfo
     * @return string
     */
    private function getLoginInfo()
    {
        return $this->loginInfo;
    }

    /**
     * Summary of loginInfo
     * @param string $loginInfo Summary of loginInfo
     * @return self
     */
    public function setLoginInfo(string $loginInfo): self
    {
        $this->loginInfo = $loginInfo;
        return $this;
    }


    private function formHeader()
    {
        echo
            '<div class="d-flex justify-content-' . $this->getJustifyHeading() . ' ' . $this->getHeadingSizing() . '">
                <h6><strong class="' . $this->getHeadingClasses() . '">' . $this->getHeading() . '</strong></h6>
            </div>

            <div class="d-flex justify-content-' . $this->getJustifyHelpText() . ' ' . $this->getHelpTextSizing() . '">
                <em class="' . $this->getHelpTextClasses() . '">' . $this->getHelpText() . '</em>
            </div>';
    }


    private function viewsHeader()
    {
        echo '  <div class="row">
                <div class="col-md-6">
                    <div class="d-flex">
                    <div>
                        <img src="' . $this->getHeadingIcon() . '" class="img-fluid sm-medium mt-3 me-2">
                    </div>
                    <div>
                        <h1 class="text-primary">' . $this->getHeading() . '</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <h6 class="text-center my-3">' . $this->getItemCountHeading() . ':
                            <span>
                                ' . $this->getItemCount() . '
                            </span>
                        </h6>';
        echo '</div>';
        echo '<div class="d-flex justify-content-end mb-3">';
        if ($this->hasButton()) {
            foreach ($this->getButtonContent() as $content):
                echo '<a class="' . $this->getButtonContentClasses()[$content] . '" href="' . $this->getButtonContentLinks()[$content] . '">' . $content . '</a>';
            endforeach;
        }

        echo '   </div>
                    </div>
                </div>';
    }


    private function profileHeader()
    {
        echo '<!-- Home page header -->
            <div class="col-md-7">
                <div class="my-2 mx-3">
                    <h3>' . $this->getHeading() . '</h3>
                    <h6>' . $this->getWelcomeText() . '</h6>
                    <h6>' . $this->getDate() . '</h6>
                </div>
            </div>  
            <div class="col-md-5">
                <div class="d-flex justify-content-end">
                    <div class="my-2 mx-3">
                        <h6>' . $this->getLoginInfo() . '</h6>
                        <h6>' . $this->getItemCountHeading() . ':' . $this->getItemCount() . '</h6>
                    </div>
                </div>
            </div>';
    }


    protected function render()
    {
        return match ($this->getType()) {
            "form-header" => $this->formHeader(),
            "views-header" => $this->viewsHeader(),
            "profile-header" => $this->profileHeader()
        };
    }

    /**
     * Summary of headingIcon
     * @return string
     */
    private function getHeadingIcon()
    {
        return $this->headingIcon;
    }

    /**
     * Summary of headingIcon
     * @param string $headingIcon Summary of headingIcon
     * @return self
     */
    public function setHeadingIcon($headingIcon): self
    {
        $this->headingIcon = $headingIcon;
        return $this;
    }

    /**
     * Summary of hasButton
     * @return bool
     */
    private function hasButton()
    {
        return $this->hasButton;
    }

    /**
     * Summary of hasButton
     * @param bool $hasButton Summary of hasButton
     * @return self
     */
    public function setHasButton($hasButton): self
    {
        $this->hasButton = $hasButton;
        return $this;
    }

    /**
     * Summary of buttonContent
     * @return array
     */
    private function getButtonContent()
    {
        return $this->buttonContent;
    }

    /**
     * Summary of buttonContent
     * @param array $buttonContent Summary of buttonContent
     * @return self
     */
    public function setButtonContent(array $buttonContent): self
    {
        $this->buttonContent = $buttonContent;
        return $this;
    }

    /**
     * Summary of buttonContentLinks
     * @return array
     */
    private function getButtonContentLinks()
    {
        return $this->buttonContentLinks;
    }

    /**
     * Summary of buttonContentLinks
     * @param array $buttonContentLinks Summary of buttonContentLinks
     * @return self
     */
    public function setButtonContentLinks(array $buttonContentLinks): self
    {
        $this->buttonContentLinks = $buttonContentLinks;
        return $this;
    }

    /**
     * Summary of buttonContentClasses
     * @return array
     */
    private function getButtonContentClasses()
    {
        return $this->buttonContentClasses;
    }

    /**
     * Summary of buttonContentClasses
     * @param array $buttonContentClasses Summary of buttonContentClasses
     * @return self
     */
    public function setButtonContentClasses($buttonContentClasses): self
    {
        $this->buttonContentClasses = $buttonContentClasses;
        return $this;
    }
}