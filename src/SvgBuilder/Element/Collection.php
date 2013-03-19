<?php

namespace SvgBuilder\Element;

use \SvgBuilder\Element\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function __construct(array $data = array())
    {
        foreach ($data as $key => $element) {
            $this->_addElement($key, $element);
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->_addElement($offset, $value);
    }

    protected function _addElement($offset, ElementInterface $element)
    {
        $this->_data[$offset] = $element;
    }

}