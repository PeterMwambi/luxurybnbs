<?php


namespace Models\Components;

use Exception;
use Models\Core\App\Helpers\Formatter;

class SectionComponent
{

    /**
     * Summary of sectionClasses
     * @var string
     */
    private $sectionClasses = "";

    /**
     * Summary of hasRows
     * @var bool
     */
    private $hasRows = false;

    /**
     * Summary of rows
     * @var array
     */
    private $rows = array();

    /**
     * Summary of rowSizing
     * @var string|array
     */
    private $rowSizing = null;

    /**
     * Summary of cols
     * @var array
     */
    private $cols = array();

    /**
     * Summary of content
     * @var array
     */
    private $content = array();


    /**
     * Summary of type
     * @var mixed
     */
    private $type;

    /**
     * Summary of justifyContent
     * @var array
     */
    private $justifyContent = array();


    /**
     * Summary of sectionClasses
     * @return string
     */
    protected function getSectionClasses()
    {
        return $this->sectionClasses;
    }

    /**
     * Summary of sectionClasses
     * @param string $sectionClasses Summary of sectionClasses
     * @return self
     */
    public function setSectionClasses(string $sectionClasses): self
    {
        $this->sectionClasses = $sectionClasses;
        return $this;
    }

    /**
     * Summary of hasRows
     * @return bool
     */
    protected function hasRows()
    {
        return $this->hasRows;
    }

    /**
     * Summary of hasRows
     * @param bool $hasRows Summary of hasRows
     * @return self
     */
    public function setHasRows(bool $hasRows): self
    {
        $this->hasRows = $hasRows;
        return $this;
    }

    /**
     * Summary of rows
     * @return array
     */
    protected function getRows()
    {
        if (count($this->rows)) {
            return $this->rows;
        } else {
            throw new Exception("Warning: section rows have not been defined");
        }
    }

    /**
     * Summary of rows
     * @param array $rows Summary of rows
     * @return self
     */
    public function setRows(array $rows): self
    {
        $this->rows = $rows;
        return $this;
    }

    /**
     * Summary of cols
     * @return array
     */
    protected function getCols()
    {
        return $this->cols;
    }

    /**
     * Summary of cols
     * @param array $cols Summary of cols
     * @return self
     */
    public function setCols(array $cols): self
    {
        $this->cols = $cols;
        return $this;
    }

    /**
     * Summary of content
     * @return array
     */
    protected function getContent()
    {
        return $this->content;
    }

    /**
     * Summary of content
     * @param array $content Summary of content
     * @return self
     */
    public function setContent(array $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Summary of rowSizing
     * @return array|string
     */
    private function getRowSizing()
    {
        return $this->rowSizing;
    }

    /**
     * Summary of rowSizing
     * @param array|string
     * @return self
     */
    public function setRowSizing(mixed $rowSizing): self
    {
        $this->rowSizing = $rowSizing;
        return $this;
    }

    /**
     * Summary of type
     * @return mixed
     */
    private function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Section type has not been defined");
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
     * Summary of loopSectionItems
     * @return void
     */
    private function loopSectionItems()
    {
        echo '<div class="row ' . $this->getRowSizing() . '">';
        foreach ($this->getRows() as $row) {
            echo ' <div class="' . $this->getCols()[$row] . '">';
            if (!empty($this->getJustify()[$row])) {
                echo '<div class="' . $this->getJustify()[$row] . '">';
            }
            foreach ($this->getContent()[$row] as $content) {
                if (Formatter::verifyFunction($content)) {
                    $content();
                } else {
                    $content;
                }
            }
            if (!empty($this->getJustify()[$row])) {
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }

    /**
     * Summary of defaultSection
     * @return void
     */
    private function defaultSection()
    {
        echo '<section class="' . $this->getSectionClasses() . '">';
        if ($this->hasRows()) {
            $this->loopSectionItems();
        }
        echo '</section>';
    }

    private function multiRowsSection()
    {
        echo '<section class="' . $this->getSectionClasses() . '">';
        foreach ($this->getRows() as $row) {
            echo '<div class="row ' . $this->getRowSizing()[$row] . '">';
            foreach ($this->getContent()[$row] as $content) {
                if (Formatter::verifyFunction($content)) {
                    $content();
                } else {
                    $content;
                }
            }
            echo '</div>';
        }
        echo '</section>';
    }


    protected function render()
    {
        return match ($this->getType()) {
            "default" => $this->defaultSection(),
            "multi-rows" => $this->multiRowsSection()
        };
    }

    /**
     * Summary of justifyContent
     * @return array
     */
    private function getJustify()
    {
        return $this->justifyContent;
    }

    /**
     * Summary of justifyContent
     * @param array $justifyContent Summary of justifyContent
     * @return self
     */
    public function setJustify(array $justifyContent): self
    {
        $this->justifyContent = $justifyContent;
        return $this;
    }
}