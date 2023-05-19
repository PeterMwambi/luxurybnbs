<?php


namespace Models\Components;

use Exception;

class FormDescriptionComponent
{
    private $heading = "";

    private $justifyHeading = "";

    private $headingColor = "";

    private $description = "";

    private $justifyDescription = "";

    private $descriptionColor = "";

    private $descriptionColumns = "";

    private $descriptionImageUrl = "";

    private $justifyDescriptionImage = "";

    private $descriptionImageUrlClasses = "";

    private $descriptionTextJustify = "";

    private $descriptionSizing = "";

    /**
     * @return string
     */
    protected function getHeading()
    {
        if (!empty($this->heading)) {
            return $this->heading;
        } else {
            throw new Exception("Warning: Form description heading has not been defined");
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
    protected function getJustifyHeading()
    {
        if (!empty($this->justifyHeading)) {
            return $this->justifyHeading;
        } else {
            throw new Exception("Warning: Form description justify heading property has not been defined");
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
    protected function getHeadingColor()
    {
        if (!empty($this->headingColor)) {
            return $this->headingColor;
        } else {
            throw new Exception("Warning: Form description heading color has not been defined");
        }
    }

    /**
     * @param string $headingColor 
     * @return self
     */
    public function setHeadingColor(string $headingColor): self
    {
        $this->headingColor = $headingColor;
        return $this;
    }

    /**
     * @return string
     */
    protected function getDescription()
    {
        if (!empty($this->description)) {
            return $this->description;
        } else {
            throw new Exception("Warning: Form description has not been defined");
        }
    }

    /**
     * @param mixed $description 
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    protected function getJustifyDescription()
    {
        if (!empty($this->justifyDescription)) {
            return $this->justifyDescription;
        } else {
            throw new Exception("Warning: Form description justify property has not been defined");
        }
    }

    /**
     * @param string $justifyDescription 
     * @return self
     */
    public function setJustifyDescription(string $justifyDescription): self
    {
        $this->justifyDescription = $justifyDescription;
        return $this;
    }

    /**
     * @return string
     */
    protected function getDescriptionColor()
    {
        if (!empty($this->descriptionColor)) {
            return $this->descriptionColor;
        } else {
            throw new Exception("Warning: Form description color has not been defined");
        }
    }

    /**
     * @param string $descriptionColor 
     * @return self
     */
    public function setDescriptionColor(string $descriptionColor): self
    {
        $this->descriptionColor = $descriptionColor;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getDescriptionColumns()
    {
        if (!empty($this->descriptionColumns)) {
            return $this->descriptionColumns;
        } else {
            throw new Exception("Form description columns have not been defined");
        }
    }

    /**
     * @param mixed $descriptionColumns 
     * @return self
     */
    public function setDescriptionColumns(string $descriptionColumns): self
    {
        $this->descriptionColumns = $descriptionColumns;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getDescriptionImageUrl()
    {
        if (!empty($this->descriptionImageUrl)) {
            return $this->descriptionImageUrl;
        } else {
            throw new Exception("Warning: Form description url has not been defined");
        }
    }

    /**
     * @param mixed $descriptionImageUrl 
     * @return self
     */
    public function setDescriptionImageUrl(string $descriptionImageUrl): self
    {
        $this->descriptionImageUrl = $descriptionImageUrl;
        return $this;
    }

    /**
     * @return string
     */
    protected function getJustifyDescriptionImage()
    {
        if (!empty($this->justifyDescriptionImage)) {
            return $this->justifyDescriptionImage;
        } else {
            throw new Exception("Warning: Form description justify image property has not been defined");
        }
    }

    /**
     * @param string $justifyDescriptionImage 
     * @return self
     */
    public function setJustifyDescriptionImage(string $justifyDescriptionImage): self
    {
        $this->justifyDescriptionImage = $justifyDescriptionImage;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionImageUrlClasses()
    {
        if (!empty($this->descriptionImageUrlClasses)) {
            return $this->descriptionImageUrlClasses;
        } else {
            throw new Exception("Warning: Form description image url classes have not been defined");
        }
    }

    /**
     * @param string $descriptionImageUrlClasses 
     * @return self
     */
    public function setDescriptionImageUrlClasses(string $descriptionImageUrlClasses): self
    {
        $this->descriptionImageUrlClasses = $descriptionImageUrlClasses;
        return $this;
    }


    /**
     * @return string
     */
    protected function getDescriptionTextJustify()
    {
        if (!empty($this->descriptionTextJustify)) {
            return $this->descriptionTextJustify;
        } else {
            throw new Exception("Warning: Form description text justify property has not been defined");
        }
    }

    /**
     * @param mixed $descriptionTextJustify 
     * @return self
     */
    public function setDescriptionTextJustify(string $descriptionTextJustify): self
    {
        $this->descriptionTextJustify = $descriptionTextJustify;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionSizing()
    {
        if (!empty($this->descriptionSizing)) {
            return $this->descriptionSizing;
        } else {
            throw new Exception("Warning: Form description sizing has not been defined");
        }
    }

    /**
     * @param string $descriptionSizing 
     * @return self
     */
    public function setDescriptionSizing(string $descriptionSizing): self
    {
        $this->descriptionSizing = $descriptionSizing;
        return $this;
    }



    public function render()
    {
        echo '
        <div class="d-flex justify-content-' . $this->getJustifyHeading() . '">
    <h1 class="text-' . $this->getHeadingColor() . '">' . $this->getHeading() . '</h1>
</div>
<div class="d-flex justify-content-' . $this->getJustifyDescription() . '">
    <h6 class="text-' . $this->getDescriptionColor() . ' ' . $this->getDescriptionColumns() . ' ' . $this->getDescriptionSizing() . ' text-' . $this->getDescriptionTextJustify() . '">' . $this->getDescription() . '</h6>
</div>
<div class="d-flex justify-content-' . $this->getJustifyDescriptionImage() . '">
    <img src="' . $this->getDescriptionImageUrl() . '" class="' . $this->getDescriptionImageUrlClasses() . '">
</div>  
        ';
    }

}