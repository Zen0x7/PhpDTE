<?php

namespace DTE;

class DTE
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

    public function __construct(public $three = new \DOMDocument('1.0', 'ISO-8859-1')) {}

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
     * Make an DTE
     *
     * @return DTE
     */
    public static function make(): DTE
    {
        return new static;
    }

    /**
     * Serializes DTE
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->three->saveXML();
    }
}
