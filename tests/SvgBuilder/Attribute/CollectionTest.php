<?php

namespace SvgBuilder\Element\Attribute;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testOffsetSet()
    {
        $attributeMock = $this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'someid'));
        $collection = new Collection();
        $collection->offsetSet('id', $attributeMock);
        $this->assertInstanceOf('SvgBuilder\\Element\\Attribute', $collection['id']);
        $this->assertEquals($attributeMock, $collection['id']);

        $this->setExpectedException('UnexpectedValueException');
        $anotherMock = $this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'something'));
        $collection->offsetSet('id', $anotherMock);
    }
}