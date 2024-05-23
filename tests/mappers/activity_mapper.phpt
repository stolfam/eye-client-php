<?php
    declare(strict_types=1);

    require __DIR__ . '/../bootstrap.php';

    // Activity mapper test

    $activityResponse = new stdClass();
    $activityResponse->id = 123;
    $activityResponse->sessionId = "id-789";
    $activityResponse->ipAddress = "example.com";

    $tag = new stdClass();
    $tag->id = 56;
    $tag->name = "test-tag";

    $activityResponse->tags[] = $tag;

    $type = new stdClass();
    $type->id = 234;
    $type->name = "Test Activity";

    $activityResponse->type = $type;
    $activityResponse->dtCreated = \Nette\Utils\DateTime::from("2022-02-02 22:22:22");

    $metadata = new stdClass();
    $metadata->key = "test-key";
    $metadata->value = "test-value";

    $activityResponse->metadata[] = $metadata;

    $activityResponse->country = new stdClass();
    $activityResponse->country->iso2 = "XY";

    $activity = (new \Ataccama\Eye\Client\Mappers\ActivityMapper($activityResponse))->getObject();

    \Tester\Assert::same(123, $activity->id);
    \Tester\Assert::same("id-789", $activity->session->id);
    \Tester\Assert::same(234, $activity->type->id);
    \Tester\Assert::same("Test Activity", $activity->type->name);
    \Tester\Assert::same("example.com", $activity->ipAddress);
    \Tester\Assert::same("XY", $activity->countryCode);
    \Tester\Assert::same("2022-02-02 22:22:22", $activity->dtCreated->format("Y-m-d H:i:s"));

    \Tester\Assert::count(1, $activity->tags);
    \Tester\Assert::count(1, $activity->metadata);

    \Tester\Assert::same("test-key", $activity->metadata->current()->key);
    \Tester\Assert::same("test-value", $activity->metadata->current()->value);
    \Tester\Assert::same(null, $activity->metadata->current()->url);

    \Tester\Assert::same(56, $activity->tags->current()->id);
    \Tester\Assert::same("test-tag", $activity->tags->current()->name);