<?php

class SvgTest extends PHPUnit_Framework_TestCase
{
    public function testRender()
    {
        $svg = new SvgBuilder\Svg();
        //$expectedSvg = file_get_contents(__DIR__ . '/sample.svg');
        $expectedString = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>'
        . "\n" . '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
        . "\n" . '<svg>'
        . "\n" . '</svg>';
        $this->assertEquals($svg->render(), $expectedString);
    }

    public function testSetOptions()
    {
        $options = $this->getMock('SvgBuilder\\Svg\\Options', array('getXmlDeclaration', 'getDocType'), array('test', 'test'));
        $options->expects($this->once())
                ->method('getXmlDeclaration');
        $options->expects($this->once())
                ->method('getDocType');
        $svg = new SvgBuilder\Svg($options);

    }

    public function testRenderAttributes()
    {
        $attribute = $this->getMock('SvgBuilder\\Element\\Attribute', array('getName', 'getValue'), array('width', '200'));
        $attribute->expects($this->atLeastOnce())
                  ->method('getName');
        $attribute->expects($this->atLeastOnce())
                  ->method('getValue');
        $attributes = $this->getMock('SvgBuilder\\Element\\Attribute\\Collection', null, array(array($attribute)));
        $svg = new SvgBuilder\Svg(null, $attributes);
        $svg->render();
    }

    public function testRenderElements()
    {
        $element = $this->getMock('SvgBuilder\\Element', array('setTabCount', 'render'), array('g'));
        $element->expects($this->atLeastOnce())
                  ->method('setTabCount');
        $element->expects($this->atLeastOnce())
                  ->method('render');
        $elements = $this->getMock('SvgBuilder\\Element\\Collection', null, array(array($element)));
        $svg = new SvgBuilder\Svg(null, null, $elements);
        $svg->render();
    }
}