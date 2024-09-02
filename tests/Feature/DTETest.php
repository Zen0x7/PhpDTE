<?php

use DTE\EnvioDTE;
use Illuminate\Support\Str;

test('EnvioDTE should starts with XML parts', function () {
    $envioDTE = EnvioDTE::make();
    expect(Str::startsWith((string) $envioDTE, '<?xml version="1.0" encoding="ISO-8859-1"?>'))
        ->toBeTrue()
        ->and(Str::contains((string) $envioDTE, '<EnvioDTE xmlns="http://www.sii.cl/SiiDte" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sii.cl/SiiDte EnvioDTE_v10.xsd" version="1.0"'))
        ->toBeTrue();
});
