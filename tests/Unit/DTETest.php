<?php

test('EnvioDTE version', function () {
    expect(\DTE\EnvioDTE::getAuthor())->toBe([
        'name' => 'Ian Torres',
        'email' => 'iantorres@outlook.com',
    ]);
});
