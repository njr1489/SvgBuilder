<?php

namespace SvgBuilder\Svg;

class Options
{
    protected $_xmlDeclaration;
    protected $_docType;

    public function __construct($xmlDeclaration, $docType)
    {
        $this->_xmlDeclaration = $xmlDeclaration;
        $this->_docType = $docType;
    }

    public function getXmlDeclaration()
    {
        return $this->_xmlDeclaration;
    }

    public function getDocType()
    {
        return $this->_docType;
    }
}