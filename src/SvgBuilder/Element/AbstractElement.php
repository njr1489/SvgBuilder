<?php

namespace SvgBuilder\Element;

use \SvgBuilder\Element\ElementInterface;
use \SvgBuilder\Element\Attribute\Collection as AttributeCollection;
use \SvgBuilder\Element\Collection as ElementCollection;

abstract class AbstractElement implements ElementInterface
{
    protected $_tag;
    protected $_attributes;
    protected $_elements;

    public function __construct($tag, AttributeCollection $attributes = null, ElementCollection $elements = null)
    {
        $this->_tag         = $tag;
        $this->_attributes  = $attributes;
        $this->_elements    = $elements;
    }

    public function __get($name)
    {
        if (!isset($this->_attributes[$name])) {
            throw new \InvalidArgumentException('The attribute ' . $name . ' does not exist within the element');
        }
        return $this->_attributes[$name];
    }

    public function __toString()
    {
        return $this->render();
    }

    public function getAttributes()
    {
        return $this->_attributes;
    }

    public function getElements()
    {
        return $this->_elements;
    }
}