<?php

use DTE\EnvioDTE;
use DTE\Models\Cover;
use Illuminate\Support\Str;

test('EnvioDTE should be serialized', function () {
    $envioDTE = EnvioDTE::make();
    $cover = new Cover('71765841-8', '75088076-2', '75388931-0', '2003-09-02', '0');
    $envioDTE->setCover($cover);
    $output = (string) $envioDTE;

    expect(Str::startsWith($output, '<?xml version="1.0" encoding="ISO-8859-1"?>'))
        ->toBeTrue()
        ->and(Str::contains($output, 'EnvioDTE xmlns="http://www.sii.cl/SiiDte" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sii.cl/SiiDte EnvioDTE_v10.xsd" version="1.0"'))
        ->toBeTrue()
        ->and(Str::contains($output, 'Caratula version="1.0"'))
        ->toBeTrue()
        ->and(Str::contains($output, 'RutEmisor>71765841-8</RutEmisor'))
        ->toBeTrue()
        ->and(Str::contains($output, 'RutEnvia>75088076-2</RutEnvia'))
        ->toBeTrue()
        ->and(Str::contains($output, 'RutReceptor>75388931-0</RutReceptor'))
        ->toBeTrue()
        ->and(Str::contains($output, 'FchResol>2003-09-02</FchResol'))
        ->toBeTrue()
        ->and(Str::contains($output, 'NroResol>0</NroResol'))
        ->toBeTrue();
});
