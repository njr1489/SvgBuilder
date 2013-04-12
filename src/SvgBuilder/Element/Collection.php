<?php

namespace SvgBuilder\Element;

use \SvgBuilder\Element\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _offsetSet($offset, $value)
    {
        $this->_addElement($offset, $value);
    }

    protected function _addElement($offset, ElementInterface $element)
    {
        if ($offset === '') {
            $this->_data[] = $element;
        }
        else {
            $this->_data[$offset] = $element;
        }
    }

}