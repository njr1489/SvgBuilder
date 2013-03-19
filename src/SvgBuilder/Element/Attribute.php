<?php

namespace SvgBuilder\Element;

class Attribute
{
    protected $_name;
    protected $_value;

    public function __construct($name, $value)
    {
        $this->_name = $name;
        $this->_value = $value;
    }

    public function __toString()
    {
        return $this->_value;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getValue()
    {
        return $this->_value;
    }
}