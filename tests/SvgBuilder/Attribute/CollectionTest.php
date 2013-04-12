<?php

namespace SvgBuilder\Element\Attribute;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testDuplicatAttribute()
    {
        $this->setExpectedException('UnexpectedValueException');
        $mocks = array(
            $this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'someid')),
            $this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'someid'))
        );
        $collection = new Collection($mocks);
    }
}