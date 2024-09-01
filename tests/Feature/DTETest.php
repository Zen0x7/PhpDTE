<?php

use DTE\DTE;
use Illuminate\Support\Str;

test('DTE should starts with XML tag', function () {
    expect(Str::startsWith((string) DTE::make(), '<?xml version="1.0" encoding="ISO-8859-1"?>'))
        ->toBeTrue();
});
