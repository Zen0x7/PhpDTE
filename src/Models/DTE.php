<?php

namespace DTE\Models;

use DOMDocument;
use DOMElement;

class DTE
{
    private DOMElement $root;

    public function __construct(private DOMDocument $tree)
    {
        $this->root = $this->tree->createElement('DTE');
    }

    public function toElement(): DOMElement
    {
        $this->root->setAttribute('xmlns', 'http://www.sii.cl/SiiDte');
        $this->root->setAttribute('version', '1.0');

        return $this->root;
    }

    public function setDocument(Document $document): void
    {
        $this->root->appendChild($document->toElement($this->tree));
    }
}
