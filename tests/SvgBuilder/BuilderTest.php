<?php

namespace SvgBuilder;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    protected $_builder;

    protected function setUp()
    {
        $this->_builder = new Builder();
    }

    public function testAddAttribute()
    {
        $this->_builder->addAttribute($this->getMock('SvgBuilder\\Element\\Attribute', null, array('id', 'value')));
        $this->setExpectedException('PHPUnit_Framework_Error');
        $this->_builder->addAttribute('bad variable');
    }

    public function testAddElement()
    {
        $this->_builder->addElement($this->getMock('SvgBuilder\\Element', null, array('g')));
        $this->setExpectedException('PHPUnit_Framework_Error');
        $this->_builder->addElement('bad variable');
    }

    public function testBuild()
    {
        $svg = $this->_builder->build();
        $this->assertInstanceOf('SvgBuilder\\Svg', $svg);
    }
}