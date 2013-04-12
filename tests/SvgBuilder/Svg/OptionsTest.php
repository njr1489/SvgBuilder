<?php

namespace SvgBuilder\Svg;

class OptionsTest extends \PHPUnit_Framework_TestCase
{
    protected $_options;

    protected function setUp()
    {
        $this->_options = new Options(
            '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>',
            '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
        );
    }

    public function testGetXmlDeclaration()
    {
        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>',
            $this->_options->getXmlDeclaration()
        );
    }

    public function testGetDoctype()
    {
        $this->assertEquals(
            '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">',
            $this->_options->getDocType()
        );
    }
}