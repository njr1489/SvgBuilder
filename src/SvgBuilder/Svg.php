<?php

namespace SvgBuilder;

use \SvgBuilder\Element\AbstractElement;
use \SvgBuilder\Svg\Options;
use \SvgBuilder\Element\Attribute\Collection as AttributeCollection;
use \SvgBuilder\Element\Collection as ElementCollection;

class Svg extends AbstractElement
{
    protected $_xmlDeclaration = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>';
    protected $_docType = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
    protected $_attributes;
    protected $_elements;

    public function __construct(Options $options = null, AttributeCollection $attributes = null, ElementCollection $elements = null)
    {
        parent::__construct('svg', $attributes, $elements);
        if ($options) {
            $this->_xmlDeclaration = $options->getXmlDeclaration();
            $this->_docType = $options->getDocType();
        }
    }

    public function render($format = true)
    {
        $endLine = '';
        $tabCount = 0;
        if ($format) {
            $endLine = PHP_EOL;
            $tabCount = 1;
        }

        $svg = $this->_xmlDeclaration . $endLine . $this->_docType . $endLine . '<' . $this->_tag;

        if ($this->_attributes) {
            foreach ($this->_attributes as $attribute) {
                $svg .= ' ' . $attribute->getName() . '="' . $attribute->getValue() . '"';
            }
        }

        $svg .= '>' . $endLine;

        if ($this->_elements) {
            foreach ($this->_elements as $element) {
                $element->setTabCount($tabCount);
                $svg .= $element->render($format);
            }
        }
        $svg .= '</' . $this->_tag . '>';
        return $svg;
    }
}