<?php
    declare(strict_types=1);

    require __DIR__ . '/../bootstrap.php';

    // Profile mapper test

    $profileResponse = new stdClass();
    $profileResponse->id = 123;
    $profileResponse->dtCreated = \Nette\Utils\DateTime::from("2022-02-02 22:22:22");
    $profileResponse->name = "John Smith";
    $profileResponse->email = "john.s@example.com";
    $profileResponse->ipAddress = "1.2.3.4";
    $profileResponse->country = null;
    $profileResponse->city = null;
    $profileResponse->keycloakId = null;
    $profileResponse->organization = null;
    $profileResponse->phone = null;
    $profileResponse->jobTitle = null;
    $profileResponse->documentation = [];
    $profileResponse->support = "None";

    $tagStat = new stdClass();
    $tagStat->name = "test-tag";
    $tagStat->count = 5;

    $profileResponse->tags = [
        $tagStat
    ];

    $profile = (new \Ataccama\Eye\Client\Mappers\ProfileMapper($profileResponse))->getObject();

    \Tester\Assert::same(123, $profile->id);
    \Tester\Assert::same("2022-02-02 22:22:22", $profile->dtCreated->format("Y-m-d H:i:s"));
    \Tester\Assert::same("John", $profile->name->first);
    \Tester\Assert::same("Smith", $profile->name->last);
    \Tester\Assert::same("john.s@example.com", $profile->email->definition);
    \Tester\Assert::same("1.2.3.4", $profile->ipAddress);
    \Tester\Assert::same(null, $profile->country);
    \Tester\Assert::same(null, $profile->city);
    \Tester\Assert::same(null, $profile->keycloakId);
    \Tester\Assert::same(null, $profile->organization);
    \Tester\Assert::same(null, $profile->jobTitle);
    \Tester\Assert::same(false, $profile->support->active);

    \Tester\Assert::count(1,$profile->tags);
    \Tester\Assert::same(5, $profile->tags->current()->count);