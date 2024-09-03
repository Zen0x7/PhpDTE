<?php

namespace DTE;

use DOMDocument;
use DomElement;
use DOMException;
use DTE\Models\Cover;
use DTE\Models\DTE;

class EnvioDTE
{
    /**
     * Author
     *
     * @const AUTHOR
     */
    private const array AUTHOR = [
        'name' => 'Ian Torres',
        'email' => 'iantorres@outlook.com',
    ];

    private DomElement $root;

    /**
     * @throws DOMException
     */
    public function __construct(public $tree = new DOMDocument('1.0', 'ISO-8859-1'))
    {
        $this->tree->preserveWhiteSpace = true;
        $this->tree->formatOutput = true;
        $this->root = $this->tree->createElement('EnvioDTE');
        $this->root->setAttribute('xmlns', 'http://www.sii.cl/SiiDte');
        $this->root->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $this->root->setAttribute('xsi:schemaLocation', 'http://www.sii.cl/SiiDte EnvioDTE_v10.xsd');
        $this->root->setAttribute('version', '1.0');
        $this->tree->appendChild($this->root);
    }

    public function setCover(Cover $cover): void
    {
        $this->root->appendChild($cover->toElement());
    }

    public function setDTE(DTE $dte): void
    {
        $this->root->appendChild($dte->toElement());
    }

    /**
     * Get the author
     *
     * @return array|string[]
     */
    public static function getAuthor(): array
    {
        return static::AUTHOR;
    }

    /**
     * Make an EnvioDTE
     */
    public static function make(): EnvioDTE
    {
        return new static;
    }

    /**
     * Serializes EnvioDTE
     */
    public function __toString(): string
    {
        return $this->tree->saveXML();
    }
}
