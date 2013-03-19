<?php

class BuilderTest extends PHPUnit_Framework_TestCase
{
    protected $_builder;

    protected function setUp()
    {
        $this->_builder = new SvgBuilder\Builder();
    }

    public function testAddAttribute()
    {
        $this->setExpectedException('PHPUnit_Framework_Error');
        $this->_builder->addAttribute('bad variable');
    }

    public function testAddElement()
    {
        $this->setExpectedException('PHPUnit_Framework_Error');
        $this->_builder->addElement('bad variable');
    }

    public function testBuild()
    {
        $svg = $this->_builder->build();
        $this->assertInstanceOf('SvgBuilder\\Svg', $svg);
    }
}