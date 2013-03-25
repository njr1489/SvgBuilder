<?php

namespace SvgBuilder\Element;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    protected $_collection;

    protected function setUp()
    {
        $this->_collection = new Collection();
    }

    public function testOffsetSet()
    {
        $elementMock = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $this->_collection->offsetSet(0, $elementMock);
        $this->assertInstanceOf('SvgBuilder\\Element', $this->_collection[0]);
        $this->assertEquals($elementMock, $this->_collection[0]);
    }

    public function testCount()
    {
        $this->_collection[] = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $this->_collection[] = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $this->assertEquals($this->_collection->count(), 2);
    }

    public function testOffsetUnset()
    {
        $this->_collection[] = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $this->_collection->offsetUnset(0);
        $this->assertEquals(0, $this->_collection->count());
    }

    public function testToArray()
    {
        $array = $this->_collection->toArray();
        $this->assertInternalType('array', $array);
    }
}