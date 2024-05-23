<?php
    declare(strict_types=1);

    require __DIR__ . '/../bootstrap.php';

    // v4 test
    $client = new Ataccama\Eye\Client\Client(HOST, BEARER);

    $metadata = new \Ataccama\Eye\Client\Env\Activities\MetadataList();
    $metadata->add(new \Ataccama\Eye\Client\Env\Activities\Metadata("test-key", "test-val"));

    $ipAddress = IP_ADDRESS;

    $type = new \Ataccama\Eye\Client\Env\Activities\Type(84, "Test");

    $session = new \Ataccama\Common\Env\Prototypes\StringId(SESSION_ID);

    $activityDefinition = new \Ataccama\Eye\Client\Env\Activities\ActivityDefinition($session, $type, $ipAddress);

    $result = $client->createActivity_v4($activityDefinition, $metadata);

    \Tester\Assert::same(true, $result);

    $activity = $client->createActivity_v3($activityDefinition, $metadata);

    \Tester\Assert::same($ipAddress, $activity->ipAddress);