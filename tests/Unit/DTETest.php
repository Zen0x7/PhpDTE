<?php

test('DTE version', function () {
    expect(\DTE\DTE::getAuthor())->toBe([
        'name' => 'Ian Torres',
        'email' => 'iantorres@outlook.com',
    ]);
});
