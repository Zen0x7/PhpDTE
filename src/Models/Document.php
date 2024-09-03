<?php

namespace DTE\Models;

use DOMDocument;
use DOMElement;

class Document
{
    private DOMElement $root;

    public function __construct(private DOMDocument $tree)
    {
        $this->root = $this->tree->createElement('Documento');
        $this->root->setAttribute('ID', 'F47504T33');

    }

    public function toElement(DOMDocument $tree): DOMElement
    {

        $header = $tree->createElement('Encabezado', 'Encabezado');
        $this->root->appendChild($header);

        $details = $tree->createElement('Detalles', 'Detalles');
        $this->root->appendChild($details);

        $ted = $tree->createElement('TED', 'ted');
        $ted->setAttribute('version', '1.0');
        $this->root->appendChild($ted);

        return $this->root;
    }
}
