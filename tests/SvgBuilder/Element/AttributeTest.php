<?php

namespace SvgBuilder\Element;

class AttributeTest extends \PHPUnit_Framework_TestCase
{
    protected $_attribute;

    protected function setUp()
    {
        $this->_attribute = new Attribute('id', 'value');
    }

    public function test__toString()
    {
        $this->assertEquals((string)$this->_attribute, 'value');
    }

    public function testGetName()
    {
        $this->assertEquals($this->_attribute->getName(), 'id');
    }

    public function testGetValue()
    {
        $this->assertEquals($this->_attribute->getValue(), 'value');
    }
}