<?php

namespace SvgBuilder;

use \SvgBuilder\Element\Attribute\Collection as AttributeCollection;
use \SvgBuilder\Element\Collection as ElementCollection;
use \SvgBuilder\Element\Attribute;
use \SvgBuilder\Element;

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
        $this->_attributes = array();
        $this->_elements = array();
    }

    public function addAttribute(Attribute $attribute)
    {
        $this->_attributes[] = $attribute;
    }

    public function addElement(Element $element)
    {
        $this->_elements[] = $element;
    }

    public function build()
    {
        return new Svg(
            $this->_options,
            new AttributeCollection($this->_attributes),
            new ElementCollection($this->_elements)
        );
    }
}