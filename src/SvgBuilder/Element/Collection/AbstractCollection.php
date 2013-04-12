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
        foreach ($data as $key => $value) {
            $this->_offsetSet($key, $value);
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

    /**
     * Checks if an offset exists 
     */
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
     * @throws \BadMethodCallException
     */
    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException('This collection is immutable, you cannot add or remove elements from it.');
    }

    /**
     * @throws \BadMethodCallException
     */
    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException('This collection is immutable, you cannot add or remove elements from it.');
    }

    /**
     * Used for child classes to implement their own form of validation
     */
    abstract protected function _offsetSet($offset, $value);

    /**
     * Returns the data as an array
     */
    public function toArray()
    {
        return $this->_data;
    }
}