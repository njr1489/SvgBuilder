<?php

namespace SvgBuilder;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    protected $_element;
    protected $_attribute;
    protected $_attributes;

    protected function setUp()
    {
        $this->_attribute = $this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'someid'));
        $this->_attributes = $this->getMock('SvgBuilder\\Element\\Attribute\\Collection', null, array(array($this->_attribute)));
        $this->_element = new Element('g', $this->_attributes);
    }

    public function testRenderWithContent()
    {
        $mockElement = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $mockElements = $this->getMock('SvgBuilder\\Element\\Collection', null, array(array($mockElement)));
        $element = new Element('g', null, $mockElements);

        $expectedString = '<g>' . "\n" . '    <g />' . "\n" . '</g>' . "\n";
        $group = $element->render();
        $this->assertEquals($group, $expectedString);
    }

    public function testRenderWithNoContent()
    {
        $group = $this->_element->render();
        $this->assertEquals($group, '<g id="someid" />' . "\n");
    }

    public function testGetTabSize()
    {
        $this->assertEquals(4, $this->_element->getTabSize());
    }

    public function testSetTabSize()
    {
        $this->_element->setTabSize(6);
        $this->assertEquals(6, $this->_element->getTabSize());
    }

    public function testGetTabCount()
    {
        $this->assertEquals(0, $this->_element->getTabCount());
    }

    public function testSetTabCount()
    {
        $this->_element->setTabCount(6);
        $this->assertEquals(6, $this->_element->getTabCount());
    }

    public function test__get()
    {
        $this->assertEquals($this->_element->id, 'someid');
        $this->setExpectedException('InvalidArgumentException');
        $this->_element->badAttribute;
    }

    public function test__toString()
    {
        $expectedString = '<g id="someid" />' . "\n";
        $this->assertEquals((string)$this->_element, $expectedString);
    }

    public function testGetAttributes()
    {
        $this->assertEquals($this->_attributes, $this->_element->getAttributes());
    }

    public function testGetElements()
    {
        $mockElement = $this->getMock('SvgBuilder\\Element', null, array('g'));
        $mockElements = $this->getMock('SvgBuilder\\Element\\Collection', null, array(array($mockElement)));
        $element = new Element('g', null, $mockElements);
        $this->assertEquals($element->getElements(), $mockElements);
    }
}