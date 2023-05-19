<?php


namespace Models\Components;

use Exception;
use Models\Core\App\Helpers\Formatter;

class AlertComponent
{


    private $name = "";

    private $type = "";

    private $color = "";

    private $display = "";

    private $successIcon = "";

    private $failIcon = "";

    private $heading = "";

    private $text = "";

    private $textCols = "";

    private $footNote = "";

    private $id = "";


    private $hasSpinner = false;

    private $spinnerType = "";

    private $justify = "";



    /**
     * Summary of setName
     * @param string $alertName
     * @return AlertComponent
     */
    public function setName(string $alertName)
    {
        $this->name = $alertName;
        return $this;
    }

    protected function getName()
    {
        if (!empty($this->name)) {
            return $this->name;
        } else {
            throw new Exception("Warning: Alert name has not been defined");
        }
    }



    /**
     * @return string
     */
    protected function getDisplay()
    {
        if (!empty($this->display)) {
            return $this->display;
        } else {
            throw new Exception("Warning: Alert display has not been defined");
        }
    }

    /**
     * @param string $display 
     * @return self
     */
    public function setDisplay($display): self
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        if (!empty($this->color)) {
            return $this->color;
        } else {
            throw new Exception("Warning: Alert color has not been defined");
        }
    }

    /**
     * @param mixed $color 
     * @return self
     */
    public function setColor($color): self
    {
        $this->color = $color;
        return $this;
    }




    /**
     * Summary of setType
     * @param string $type
     * @return AlertComponent
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }



    /**
     * Summary of getType
     * @throws Exception
     * @return string
     */
    protected function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Alert type has not been defined");
        }
    }

    /**
     * @return string
     */
    protected function getSuccessIcon()
    {
        if (!empty($this->successIcon)) {
            return $this->successIcon;
        } else {
            throw new Exception("Warning: Alert success icon has not been defined");
        }
    }

    /**
     * @param string $successIcon 
     * @return self
     */
    public function setSuccessIcon(string $successIcon): self
    {
        $this->successIcon = $successIcon;
        return $this;
    }

    /**
     * @return string
     */
    protected function getFailIcon()
    {
        if (!empty($this->failIcon)) {
            return $this->failIcon;
        } else {
            throw new Exception("Warning: Alert fail icon has not been defined");
        }
    }

    /**
     * @param string $failIcon 
     * @return self
     */
    public function setFailIcon(string $failIcon): self
    {
        $this->failIcon = $failIcon;
        return $this;
    }


    /**
     * @return string
     */
    protected function getHeading()
    {
        if (!empty($this->heading)) {
            return $this->heading;
        } else {
            throw new Exception("Warning: Alert heading has not been defined");
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
     * @return mixed
     */
    protected function getText()
    {
        if (!empty($this->text)) {
            return $this->text;
        } else {
            throw new Exception("Warning: Alert text has not been defined");
        }
    }

    /**
     * @param mixed $text 
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    protected function getFootNote()
    {
        if (!empty($this->footNote)) {
            return $this->footNote;
        } else {
            throw new Exception("Warning: Alert footnote has not been defined");
        }
    }

    /**
     * @param string $footNote 
     * @return self
     */
    public function setFootNote(string $footNote): self
    {
        $this->footNote = $footNote;
        return $this;
    }


    protected function formAlert()
    {
        echo '<div class="' . $this->getName() . ' alert alert-' . $this->getColor() . ' alert-dismissable fade show ' . $this->getDisplay() . '" role="alert">
                <div class="d-flex">
                    <div>
                        <img src="' . $this->getFailIcon() . '" class="img-fluid small error">
                    </div>
                    <div>
                        <img src="' . $this->getSuccessIcon() . '" class="img-fluid small d-none success">
                    </div>
                    <div class="mx-2">
                        <h6 class="mt-1"><strong class="alert-heading">' . $this->getHeading() . '</strong></h6>
                    </div>
                </div>
                <div class="mx-2">
                    *<em class="alert-text">' . $this->getText() . '</em>
                </div>
                <div class="mx-2">
                    <h6 class="mt-1 alert-footnote">' . $this->getFootNote() . '</h6>
                </div>
            </div>';
        return $this;
    }





    protected function completeSetupAlert()
    {
        echo '<div class="row justify-content-center ' . $this->getDisplay() . '" id="' . $this->getId() . '">
    <div class="col-12 mt-3 d-flex justify-content-center">
        <img src="' . $this->getSuccessIcon() . '" class="img-fluid medium">
    </div>
    <div class="col-12 mt-3">
        <div class="mb-3 d-flex justify-content-center">
            <h3><strong>' . $this->getHeading() . '</strong></h3>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <h6 class="text-center ' . $this->getTextCols() . ' complete-setup-info-text">' . $this->getText() . '</h6>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <em class="text-center complete-setup-footnote-text">' . $this->getFootNote() . '</em>
        </div>
    </div>

</div>';
    }


    protected function infoAlert()
    {
        echo ' <div class="alert alert-' . $this->getColor() . ' ' . $this->getDisplay() . '" role="alert">
                    <div class="d-flex justify-content-' . $this->getJustify() . '">
                        <h6>' . $this->getText() . '</h6>
                    </div>';

        if ($this->hasSpinner()) {
            $spinner = $this->getSpinnerType();
            if (Formatter::verifyFunction($spinner)) {
                $spinner();
            }
        }

        echo '</div>';
    }




    protected function render()
    {
        return match ($this->getType()) {
            "form-alert" => $this->formAlert(),
            "complete-setup-alert" => $this->completeSetupAlert(),
            "info-alert" => $this->infoAlert()
        };
    }



    /**
     * @return string
     */
    public function getId()
    {
        if (!empty($this->id)) {
            return $this->id;
        } else {
            throw new Exception("Warning: Alert id has not been defined");
        }
    }

    /**
     * @param string $id 
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextCols()
    {
        if (!empty($this->textCols)) {
            return $this->textCols;
        } else {
            throw new Exception("Warning: Text cols have not been defined");
        }
    }

    /**
     * @param string $textCols 
     * @return self
     */
    public function setTextCols($textCols): self
    {
        $this->textCols = $textCols;
        return $this;
    }

    /**
     * @return mixed
     */
    private function hasSpinner()
    {
        return $this->hasSpinner;
    }

    /**
     * @param mixed $hasSpinner 
     * @return self
     */
    public function setHasSpinner($hasSpinner): self
    {
        $this->hasSpinner = $hasSpinner;
        return $this;
    }

    /**
     * @return string
     */
    private function getSpinnerType()
    {
        return $this->spinnerType;
    }

    /**
     * @param string $spinnerType 
     * @return self
     */
    public function setSpinnerType(string $spinnerType): self
    {
        $this->spinnerType = $spinnerType;
        return $this;
    }

    /**
     * @return string
     */
    private function getJustify()
    {
        return $this->justify;
    }

    /**
     * @param mixed $justify 
     * @return string
     */
    public function setJustify(string $justify): self
    {
        $this->justify = $justify;
        return $this;
    }
}


?>