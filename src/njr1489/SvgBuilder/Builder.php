<?php

namespace SvgBuilder;

use Element\Attribute\Collection as AttributeCollection;
use Element\ElementCollection;
use Element\Attribute;
use Element;

class Builder
{
    protected $_options;
    protected $_attributes;
    protected $_elements;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->_options = null;
        $this->_attributes = new AttributeCollection();
        $this->_elements = new ElementCollection();
    }

    public function addAttribute(Attribute $attribute)
    {
        $this->_attributes[] = $attribute;
    }

    public function addElement(Element $element)
    {
        $this->_elements[] = $_element;
    }

    public function build()
    {
        return new SVG($this->_options, $this->_attributes, $this->_elements);
    }
}