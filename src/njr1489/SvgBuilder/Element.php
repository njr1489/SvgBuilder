<?php

namespace SvgBuilder;

use Element\AbstractElement;
use Element\Attribute\Collection as AttributeCollection;
use Element\Collection as ElementCollection;

class Element extends AbstractElement;
{
    protected $_tabSize;
    protected $_tabCount;

    public function __construct($tag, AttributeCollection $attributes = null, ElementCollection $elements = null, $tabSize = 4, $tabCount = 0)
    {
        parent::__construct($tag, $attributes, $elements);
        $this->_tabSize = $tabSize;
        $this->_tabCount = $tabCount;
    }

    public function render($format = true)
    {
        $endLine = '';
        $tabs = '';
        if ($format) {
            $endLine = PHP_EOL;
            $tabs = str_repeat(' ', $this->_tabCount * $this->_tabSize);
        }

        $element =  $tabs . '<' . $this->_tag;

        if ($this->_attributes) {
            foreach ($this->_attributes as $attribute) {
                $element .= ' ' . $attribute->getName() . '="' . $attribute->getValue() . '"';
            }
        }

        $endTag = ' />' . $endLine;

        if ($this->_elements) {
            $element .= '>' . $endLine;

            foreach ($this->_elements as $child) {
                if ($format) {
                    $child->setTabCount($this->_tabCount + 1);
                }
                $element .= $child->render();
            }

            $endTag = $tabs . '</' . $this->_tag . '>' . $endLine;
        }

        $element .= $endTag;
        return $element;
    }

    public function getTabSize()
    {
        return $this->_tabSize;
    }

    public function setTabSize($size)
    {
        $this->_tabSize = $size;
        return $this;
    }

    public function getTabCount()
    {
        return $this->_tabCount;
    }

    public function setTabCount($count)
    {
        $this->_tabCount = $count;
        return $this;
    }
}