<?php

namespace Models\Components;

use Exception;


class TableComponent
{

    /**
     * Summary of type
     * @var string
     */
    private $type = "";
    /**
     * Summary of tableColor
     * @var string
     */
    private $tableColor = "";
    /**
     * Summary of tableType
     * @var string
     */
    private $tableType = "";
    /**
     * Summary of columns
     * @var array
     */
    private $columns = array();

    /**
     * Summary of tableData
     * @var array
     */
    private $tableData = array();

    /**
     * Summary of hasActionButtons
     * @var bool
     */
    private $hasActionButtons = false;

    /**
     * Summary of actionButtonContent
     * @var array
     */
    private $actionButtonContent = array();

    /**
     * Summary of actionButtonLinks
     * @var array
     */
    private $actionButtonLinks = array();
    /**
     * Summary of actionButtonClasses
     * @var array
     */
    private $actionButtonClasses = array();


    /**
     * Summary of type
     * @return string
     */
    private function getType()
    {
        if (!empty($this->type)) {
            return $this->type;
        } else {
            throw new Exception("Warning: Table type has not been defined");
        }
    }

    /**
     * Summary of type
     * @param string $type Summary of type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Summary of tableColor
     * @return string
     */
    private function getTableColor()
    {
        return $this->tableColor;
    }

    /**
     * Summary of tableColor
     * @param string $tableColor Summary of tableColor
     * @return self
     */
    public function setTableColor(string $tableColor): self
    {
        $this->tableColor = $tableColor;
        return $this;
    }

    /**
     * Summary of tableType
     * @return string
     */
    private function getTableType()
    {
        return $this->tableType;
    }

    /**
     * Summary of tableType
     * @param string $tableType Summary of tableType
     * @return self
     */
    public function setTableType(string $tableType): self
    {
        $this->tableType = $tableType;
        return $this;
    }

    /**
     * Summary of columns
     * @return array
     */
    private function getColumns()
    {
        return $this->columns;
    }

    /**
     * Summary of columns
     * @param array $columns Summary of columns
     * @return self
     */
    public function setColumns(array $columns): self
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Summary of tableData
     * @return array
     */
    private function getTableData()
    {
        return $this->tableData;
    }

    /**
     * Summary of tableData
     * @param array $tableData Summary of tableData
     * @return self
     */
    public function setTableData(array $tableData): self
    {
        $this->tableData = $tableData;
        return $this;
    }

    /**
     * Summary of hasActionButtons
     * @return bool
     */
    protected function hasActionButtons()
    {
        return $this->hasActionButtons;
    }

    /**
     * Summary of hasActionButtons
     * @param bool $hasActionButtons Summary of hasActionButtons
     * @return self
     */
    public function setHasActionButtons(bool $hasActionButtons): self
    {
        $this->hasActionButtons = $hasActionButtons;
        return $this;
    }

    /**
     * Summary of actionButtonContent
     * @return array
     */
    private function getActionButtonContent()
    {
        return $this->actionButtonContent;
    }

    /**
     * Summary of actionButtonContent
     * @param array $actionButtonContent Summary of actionButtonContent
     * @return self
     */
    public function setActionButtonContent(array $actionButtonContent): self
    {
        $this->actionButtonContent = $actionButtonContent;
        return $this;
    }

    /**
     * Summary of actionButtonLinks
     * @return array
     */
    private function getActionButtonLinks()
    {
        return $this->actionButtonLinks;
    }

    /**
     * Summary of actionButtonLinks
     * @param array $actionButtonLinks Summary of actionButtonLinks
     * @return self
     */
    public function setActionButtonLinks(array $actionButtonLinks): self
    {
        $this->actionButtonLinks = $actionButtonLinks;
        return $this;
    }

    /**
     * Summary of actionButtonClasses
     * @return array
     */
    private function getActionButtonClasses()
    {
        return $this->actionButtonClasses;
    }

    /**
     * Summary of actionButtonClasses
     * @param array $actionButtonClasses Summary of actionButtonClasses
     * @return self
     */
    public function setActionButtonClasses(array $actionButtonClasses): self
    {
        $this->actionButtonClasses = $actionButtonClasses;
        return $this;
    }

    protected function loopTableColumns()
    {
        if (count($this->getColumns())) {
            echo '<thead>';
            echo '<tr>';
            foreach ($this->getColumns() as $column) {
                echo '<th scope="col">' . $column . '</th>';
            }
            if ($this->hasActionButtons()) {
                echo '<th colspan="2">';
                echo '<h6 class="text-center mb-1"><strong>Actions</strong></h6>';
            }
            echo '<tr>';
            echo "</thead>";
        }
        return $this;
    }


    protected function loopTableBody()
    {
        if (count($this->getTableData())) {
            echo '<tbody>';

            foreach ($this->getTableData() as $tableRow) {
                echo '<tr>';
                foreach (array_keys($tableRow) as $key) {
                    for ($x = 0; $x < count($this->getColumns()); $x++) {
                        if ($key === $this->getColumns()[$x]) {
                            echo '<td>' . $tableRow[$key] . '</td>';
                        }
                    }
                }
                if ($this->hasActionButtons()) {
                    foreach ($this->getActionButtonContent() as $content) {
                        echo '<td>';
                        echo '<a class="' . $this->getActionButtonClasses()[$content] . '" href="' . $this->getActionButtonLinks()[$content] . '"> ' . $content . '</a>';
                        echo '</td>';
                    }
                }
                echo '</tr>';
            }
            echo '<tbody>';
        }
    }

    protected function defaultTableSetup()
    {
        echo '<table class="table table-' . $this->getTableColor() . ' table-' . $this->getTableType() . '">';
        $this->loopTableColumns();
        $this->loopTableBody();
        echo '</table>';
    }

    protected function render()
    {
        return match ($this->getType()) {
            "default" => $this->defaultTableSetup(),
        };
    }
}