<?php

namespace SvgBuilder\Element\Attribute;

use \SvgBuilder\Element\Collection\AbstractCollection;
use \SvgBuilder\Element\Attribute;

class Collection extends AbstractCollection
{
    protected function _offsetSet($offset, $value)
    {
        $this->_addAttribute($value);
    }

    protected function _addAttribute(Attribute $attribute)
    {
        $name = $attribute->getName();
        if (isset($this->_data[$name])) {
            throw new \UnexpectedValueException('The attribute "' . $name . '" already exists within this collection.');
        }
        $this->_data[$name] = $attribute;
    }
}