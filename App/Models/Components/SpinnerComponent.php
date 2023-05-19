<?php

namespace Models\Components;

use Exception;

class SpinnerComponent
{


    private $name = "";


    private $count = 0;

    private $justify = "";

    private $type = "";

    private $size = "";

    private $color = "";

    private $display = "";


    /**
     * @return mixed
     */
    protected function getName()
    {
        if (!empty($this->name)) {
            return $this->name;
        } else {
            throw new Exception("Warning: Spinner name has not been defined");
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
    protected function getCount()
    {
        if ($this->count > 0) {
            return $this->count;
        } else {
            throw new Exception("Warning: Spinner count has not been defined");
        }
    }

    /**
     * @param mixed $count 
     * @return self
     */
    public function setCount(int $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getJustify()
    {
        if (!empty($this->justify)) {
            return $this->justify;
        } else {
            throw new Exception("Warning: spinner Justify has not been defined");
        }
    }

    /**
     * @param mixed $justify 
     * @return self
     */
    public function setJustify($justify): self
    {
        $this->justify = $justify;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Spinner type has not been defined");
        }
    }

    /**
     * @param mixed $type 
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
    protected function getColor()
    {
        if (!empty($this->color)) {
            return $this->color;
        } else {
            throw new Exception("Warning: Spinner color has not been defined");
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
    protected function getSize()
    {
        if (!empty($this->size)) {
            return $this->size;
        } else {
            throw new Exception("Warning: Spinner size has not been defined");
        }
    }

    /**
     * @param mixed $size 
     * @return self
     */
    public function setSize($size): self
    {
        $this->size = $size;
        return $this;
    }


    /**
     * @return mixed
     */
    protected function getDisplay()
    {
        if (!empty($this->display)) {
            return $this->display;
        } else {
            throw new Exception("Warning: Spinner display has not been defined");
        }
    }

    /**
     * @param mixed $display 
     * @return self
     */
    public function setDisplay($display): self
    {
        $this->display = $display;
        return $this;
    }



    protected function setSpinnerItemCount()
    {
        for ($x = 0; $x <= $this->getCount(); $x++) {
            echo '<div class="' . $this->getType() . ' text-' . $this->getColor() . ' mx-2 ' . $this->getType() . '-' . $this->getSize() . ' ' . $this->getDisplay() . '" role="status">
                     <span class="visually-hidden">Loading...</span>
                </div>';
        }
    }


    protected function render()
    {
        echo '<div class="' . $this->getName() . ' d-flex justify-content-' . $this->getJustify() . ' align-items-center">';
        $this->setSpinnerItemCount();
        echo '</div>';
    }

}