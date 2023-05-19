<?php

namespace Models\Components;

use Exception;
use Models\Core\App\Helpers\Formatter;

class FormComponent
{
    private static $options;


    private $_fields = array();
    private $_rows = 0;

    private $_cols = array();

    private $_formContent = array();

    private static function getClassNames(array $classNames = [])
    {
        if (count($classNames)) {
            $className = "";
            $x = 1;
            foreach ($classNames as $class) {
                $className .= $class;
                if ($x < count($classNames)) {
                    $className .= " ";
                }
                $x++;
            }
            return $className;
        }
    }

    public static function input(array $attributes = [], $hasInputGroup = false, $inputGroupDetails = [])
    {
        if ($hasInputGroup) {
            echo '<div class="input-group">
                <div class="input-group-text">
                    <span name="input-group-prefix">' . $inputGroupDetails["prefix"] . '</span>
                </div>';
        }
        if (count($attributes)) {
            echo '<input ';
            foreach ($attributes as $attribute => $value) {
                if ($attribute === "has-group" || $attribute == "group-details") {
                    continue;
                }
                echo ' ' . $attribute . ' ="' . $value . '" ';
            }
            echo ' >';
        }
        if ($hasInputGroup) {
            echo '</div>';
        }

        return;
    }


    public static function label(array $attributes, $innerHTML)
    {
        if (count($attributes)) {
            echo '<label ';
            foreach ($attributes as $attribute => $value) {
                if ($attribute === "value") {
                    continue;
                }
                echo ' ' . $attribute . '="' . $value . '"';
            }
            echo ' >';
            echo $innerHTML;
            echo "</label>";
            return;
        }
    }

    public static function textarea(array $attributes, string $innerHtml)
    {

        echo '<textarea ';
        foreach ($attributes as $attribute => $value) {
            if ($attribute === "value") {
                continue;
            }
            echo ' ' . $attribute . '="' . $value . '"';
        }
        echo '>';
        echo $innerHtml;
        echo '</textarea>';
        return;
    }

    private static function selectOptions(array $options, $selectedOption = null)
    {
        foreach ($options as $option) {
            if (!empty($selectedOption) && $selectedOption === $option) {
                self::$options .= '<option selected="selected">' . $option . '</option>';
                continue;
            }
            self::$options .= '<option>' . $option . '</option>';
        }
        return self::$options;
    }
    public static function initializeOptions()
    {
        return self::$options = "";
    }
    public static function select(string $name, array $options = array(), $class, $selectedOption = null)
    {
        if (!empty($name)) {
            echo '<select name="' . $name . '" class="' . $class . '">' . self::selectOptions($options, $selectedOption) . '</select>';
            return;
        }
    }



    public static function button(string $color, string $type, bool $hasSpinner = true, string $value)
    {
        echo '<div class="mt-3">
    <button type="' . $type . '" class="btn btn-lg btn-' . $color . ' action-button w-100">';
        if ($hasSpinner) {
            echo '<span class="spinner-border spinner-border-sm d-none btn-spinner me-2" role="status" aria-hidden="true"></span>';
        }
        echo '<span class="btn-info">' . $value . '</span>
        &raquo;
    </button>
</div>';
    }


    public static function additionalButton(string $color, string $purpose, string $link, string $size, string $innerHTML)
    {
        echo '<a class="btn btn-outline-' . $color . ' ' . $purpose . ' ' . $size . '" href="' . $link . '">' . $innerHTML . '</a>';
    }

    /**
     * @return array
     */
    protected function getfields()
    {
        if (count($this->_fields)) {
            return $this->_fields;
        } else {
            throw new Exception("Warning: Fields have not been defined");
        }
    }

    /**
     * @param mixed $_fields 
     * @return self
     */
    public function setFields(array $fields): self
    {
        $this->_fields = $fields;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getRows()
    {
        if ($this->_rows > 0) {
            return $this->_rows;
        } else {
            throw new Exception("Warning: Rows have not been defined");
        }
    }

    /**
     * @param mixed $_rowCount 
     * @return self
     */
    public function setRows(int $rows): self
    {
        $this->_rows = $rows;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getCols()
    {
        if (count($this->_cols)) {
            return $this->_cols;
        } else {
            throw new Exception("Warning: Columns have not been defined");
        }
    }

    /**
     * @param mixed $_cols 
     * @return self
     */
    public function setCols(array $cols): self
    {
        $this->_cols = $cols;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getContent()
    {
        if (count($this->_formContent)) {
            return $this->_formContent;
        } else {
            throw new Exception("Warning: Form Content has not been declared");
        }
    }

    /**
     * @param mixed $formContent 
     * @return self
     */
    public function setContent(array $formContent): self
    {
        $this->_formContent = $formContent;
        return $this;
    }


    protected function formRowsAndColumns()
    {
        for ($x = 1; $x <= $this->getRows(); $x++) {
            echo '<div class="row">';
            foreach ($this->getFields() as $field) {
                echo '<div class="' . $this->getCols()[$field] . '">';
                $this->resolveContent($this->getContent()[$field]);
                echo '</div>';
            }
            echo '</div>';
        }
    }


    protected function resolveContent(array $items)
    {
        foreach (array_keys($items) as $item) {
            switch ($item) {
                case 'label':
                    $properties = $items["label"];
                    $value = Formatter::verifyArrayKey("value", $properties) ? $properties["value"] : "";
                    self::label($properties, $value);
                    break;
                case 'input':
                    $properties = $items["input"];
                    if (!empty($properties["has-group"])) {
                        self::input($properties, $properties["has-group"], $properties["group-details"]);
                    } else {
                        self::input($properties);
                    }
                    break;
                case 'textarea':
                    $properties = $items["textarea"];
                    $value = Formatter::verifyArrayKey("value", $properties) ? $properties["value"] : "";
                    self::textarea($properties, $value);
                    break;
                case 'select':
                    self::initializeOptions();
                    $properties = $items["select"];
                    self::select($properties["name"], $properties["options"], $properties["class"]);
                    break;
                case 'button':
                    $properties = $items["button"];
                    self::button($properties["color"], $properties["type"], $properties["has-spinner"], $properties["value"]);
                    break;
                case 'additional-buttons':
                    $properties = $items["additional-buttons"];
                    self::additionalButton($properties["color"], $properties["purpose"], $properties["link"], $properties["size"], $properties["innerHtml"]);
            }
        }
    }


    protected function render(array $attributes = array())
    {
        if (count($attributes)) {
            echo '<form ';
            foreach ($attributes as $attribute => $value) {
                echo ' ' . $attribute . '="' . $value . '"';
            }
            echo '>';
            $this->formRowsAndColumns();
            echo '</form>';
        }
    }
}