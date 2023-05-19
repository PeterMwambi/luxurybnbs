<?php


//Test if class exists

class MyClass
{

    private $data;

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function writeData()
    {
        if (!empty($this->data)) {
            echo $this->data;
        }
        // $this->writeData(); causes an infinite recursion
        return;
    }
}


$class = "MyClass";

if (class_exists($class)) {
    $class = new $class;
    $class->setData("Peter Mwambi");
    die($class->writeData());
} else {
    die("false");
}