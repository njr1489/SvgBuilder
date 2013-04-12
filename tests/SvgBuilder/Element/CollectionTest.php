<?php

namespace SvgBuilder\Element;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testOffsetSet()
    {
        $this->setExpectedException('BadMethodCallException');
        $collection = new Collection(array(null => $this->getMock('SvgBuilder\\Element', null, array('g'))));
        $collection->offsetSet(null, $this->getMock('SvgBuilder\\Element', null, array('g')));
    }

    public function testCount()
    {
        $mocks = array(
            $this->getMock('SvgBuilder\\Element', null, array('a')),
            $this->getMock('SvgBuilder\\Element', null, array('b')),
            $this->getMock('SvgBuilder\\Element', null, array('c'))
        );
        $collection = new Collection($mocks);
        $this->assertCount(3, $collection);
    }

    public function testOffsetUnset()
    {
        $this->setExpectedException('BadMethodCallException');
        $collection = new Collection(array($this->getMock('SvgBuilder\\Element', null, array('g'))));
        $collection->offsetUnset(0);
    }

    public function testToArray()
    {
        $mocks = array(
            $this->getMock('SvgBuilder\\Element', null, array('a')),
            $this->getMock('SvgBuilder\\Element', null, array('b')),
            $this->getMock('SvgBuilder\\Element', null, array('c'))
        );
        $collection = new Collection($mocks);
        $this->assertInternalType('array', $collection->toArray());
    }
}