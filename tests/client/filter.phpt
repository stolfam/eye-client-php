<?php
    declare(strict_types=1);

    use Ataccama\Common\Env\Email;


    require __DIR__ . '/../bootstrap.php';

    // v4 test
    $client = new Ataccama\Eye\Client\Client(HOST, BEARER);

    $userKey = new \Ataccama\Eye\Client\Env\CacheKeys\UserKey(123);

    \Tester\Assert::same("123",$userKey->id);
    \Tester\Assert::same("123",$userKey->getId());

    $filterUserKey = new \Ataccama\Eye\Client\Env\CacheKeys\UserFilterKey(new \Ataccama\Eye\Client\Env\Users\Filter([
        \Ataccama\Eye\Client\Env\Users\Filter::EMAIL => "test@test.test"
    ]));

    \Tester\Assert::same("test@test.test",$filterUserKey->id);
    \Tester\Assert::same("test@test.test",$filterUserKey->getId());

    $filterUserKey = new \Ataccama\Eye\Client\Env\CacheKeys\UserFilterKey(new \Ataccama\Eye\Client\Env\Users\Filter([
        \Ataccama\Eye\Client\Env\Users\Filter::KEYCLOAK_ID => "xasouh1782T"
    ]));

    \Tester\Assert::same("xasouh1782T",$filterUserKey->id);
    \Tester\Assert::same("xasouh1782T",$filterUserKey->getId());

    $filterUserKey = new \Ataccama\Eye\Client\Env\CacheKeys\UserFilterKey(new \Ataccama\Eye\Client\Env\Users\Filter([
        \Ataccama\Eye\Client\Env\Users\Filter::SESSION => "woieuwqoe1837"
    ]));

    \Tester\Assert::same("woieuwqoe1837",$filterUserKey->id);
    \Tester\Assert::same("woieuwqoe1837",$filterUserKey->getId());