<?php

namespace Models\Components;

use Exception;

class ProgressBarComponent
{


    private $name = "";

    private $isAnimated = true;

    private $role = "";

    private $color = "";

    private $width = 0;

    private $minWidth = 0;

    private $maxWidth = 100;

    private $description = "";

    private $additionalClasses = "";



    /**
     * @return mixed
     */
    protected function getName()
    {
        if (!empty($this->name)) {
            return $this->name;
        } else {
            throw new Exception("Warning: Progress bar name has not been defined");
        }
    }

    /**
     * @param mixed $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getIsAnimated()
    {
        if (is_bool($this->isAnimated)) {
            return $this->isAnimated;
        } else {
            throw new Exception("Warning: Progress bar variation has not been defined");
        }
    }

    /**
     * @param mixed $isAnimated 
     * @return self
     */
    public function setIsAnimated($isAnimated): self
    {
        $this->isAnimated = $isAnimated;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getRole()
    {
        if (!empty($this->role)) {
            return $this->role;
        } else {
            throw new Exception("Warning: Progress bar role has not been defined");
        }
    }

    /**
     * @param mixed $role 
     * @return self
     */
    public function setRole($role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getColor()
    {
        if (!empty($this->color)) {
            return $this->color;
        } else {
            throw new Exception("Warning: Progress bar role has not been defined");
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
     * @return mixed
     */
    protected function getWidth()
    {
        if ($this->width > 0) {
            return $this->width;
        } else {
            throw new Exception("Warning: Progress bar width has not been defined");
        }
    }

    /**
     * @param mixed $width 
     * @return self
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getMinWidth()
    {
        if (isset($this->minWidth)) {
            return $this->minWidth;
        } else {
            throw new Exception("Warning: Progress bar min width has not been defined");
        }
    }

    /**
     * @param mixed $minWidth 
     * @return self
     */
    public function setMinWidth(int $minWidth): self
    {
        $this->minWidth = $minWidth;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getMaxWidth()
    {
        if (isset($this->maxWidth)) {
            return $this->maxWidth;
        } else {
            throw new Exception("Warning: Progress bar max width has not been defined");
        }
    }

    /**
     * @param int $maxWidth 
     * @return self
     */
    public function setMaxWidth(int $maxWidth): self
    {
        $this->maxWidth = $maxWidth;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getDescription()
    {
        if (!empty($this->description)) {
            return $this->description;
        } else {
            throw new Exception("Warning: Progress bar description has not been set");
        }
    }

    /**
     * @param string $description 
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }


    /**
     * @return mixed
     */
    protected function getAdditionalClasses()
    {
        if (!empty($this->additionalClasses)) {
            return $this->additionalClasses;
        } else {
            throw new Exception("warning: No additional classes have been defined");
        }
    }

    /**
     * @param string $additionalClasses 
     * @return self
     */
    public function setAdditionalClasses(string $additionalClasses): self
    {
        $this->additionalClasses = $additionalClasses;
        return $this;
    }



    protected function render()
    {
        if ($this->getIsAnimated()) {
            echo '<div class="progress ' . $this->getAdditionalClasses() . ' ' . $this->getName() . '">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-' . $this->getColor() . '" role="' . $this->getRole() . '"
                            style="width: ' . $this->getWidth() . '%;" aria-valuenow="' . $this->getWidth() . '" aria-valuemin="' . $this->getMinWidth() . '" aria-valuemax="' . $this->getMaxWidth() . '">' . $this->getDescription() . '</div>
                </div>';
        } else {
            echo '<div class="progress ' . $this->getAdditionalClasses() . '">
                        <div class="progress-bar bg-' . $this->getColor() . '" role="' . $this->getRole() . '" style="width: ' . $this->getWidth() . '%;"
                        aria-valuenow="' . $this->getWidth() . '" aria-valuemin="' . $this->getMinWidth() . '" aria-valuemax="' . $this->getMaxWidth() . '">' . $this->getDescription() . '</div>
                </div>';
        }
    }


}

?>