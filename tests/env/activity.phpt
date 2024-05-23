<?php
    declare(strict_types=1);

    require __DIR__ . '/../bootstrap.php';

    $activity = new \Ataccama\Eye\Client\Env\Activities\Activity(123, \Nette\Utils\DateTime::from("now"),
        new \Ataccama\Common\Env\Prototypes\StringId("id-789"),
        new \Ataccama\Eye\Client\Env\Activities\Type(456, "TestType"));

    \Tester\Assert::same(123, $activity->id);
    \Tester\Assert::same(456, $activity->type->id);
    \Tester\Assert::same("id-789", $activity->session->id);
    \Tester\Assert::same(null, $activity->ipAddress);

    $activity = new \Ataccama\Eye\Client\Env\Activities\Activity(123, \Nette\Utils\DateTime::from("now"),
        new \Ataccama\Common\Env\Prototypes\StringId("id-789"),
        new \Ataccama\Eye\Client\Env\Activities\Type(456, "TestType"), "1.2.3.4");

    \Tester\Assert::same("1.2.3.4", $activity->ipAddress);