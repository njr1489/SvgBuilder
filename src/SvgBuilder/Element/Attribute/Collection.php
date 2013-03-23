<?php

namespace SvgBuilder\Element\Attribute;

use \SvgBuilder\Element\Collection\AbstractCollection;
use \SvgBuilder\Element\Attribute;

class Collection extends AbstractCollection
{
    public function offsetSet($offset, $value)
    {
        $this->_addAttribute($offset, $value);
    }

    protected function _addAttribute($offset, Attribute $attribute)
    {
        $name = $attribute->getName();
        if (isset($this->_data[$name])) {
            throw new \UnexpectedValueException('The attribute "' . $name . '" already exists within this collection.');
        }
        $this->_data[$name] = $attribute;
    }
}