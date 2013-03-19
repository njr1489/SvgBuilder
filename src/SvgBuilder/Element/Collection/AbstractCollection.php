<?php

namespace SvgBuilder\Element\Collection;

abstract class AbstractCollection implements \IteratorAggregate, \ArrayAccess, \Countable
{
    /**
     * Container
     * @var array
     */
    protected $_data = array();

    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        foreach ($data as $value) {
            $this->_data[] = $value;
        }
    }

    /**
     * Implementing Countable
     * @return integer
     */
    public function count()
    {
        return count($this->_data);
    }

    /**
     * Implementing IteratorAggregate
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->_data);
    }

    public function offsetExists($offset)
    {
        return isset($this->_data[$offset]);
    }

    /**
     * Gets the offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->_data[$offset];
    }

    /**
     * Unsets an element at the offset position
     */
    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }   
}