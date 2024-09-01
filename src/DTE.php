<?php

namespace DTE;
class DTE
{
    /**
     * Author
     * @const AUTHOR
     */
    private const array AUTHOR = [
        "name" => "Ian Torres",
        "email" => "iantorres@outlook.com",
    ];

    /**
     * Get the author
     * @return array|string[]
     */
    public static function getAuthor() : array {
        return static::AUTHOR;
    }
}