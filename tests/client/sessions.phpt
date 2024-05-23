<?php
    declare(strict_types=1);

    use Ataccama\Common\Env\Email;


    require __DIR__ . '/../bootstrap.php';

    // v4 test
    $client = new Ataccama\Eye\Client\Client(HOST, BEARER);

    $sessionId = SESSION_ID;
    $userId = 0;

    if (file_exists(TEMP_USER)) {
        $userId = json_decode(file_get_contents(TEMP_USER))->userId;


        $retVal = $client->identifySession(new \Ataccama\Common\Env\Prototypes\StringId($sessionId),
            new \Ataccama\Common\Env\Prototypes\IntegerId($userId));

        \Tester\Assert::same(true, $retVal);

        $session = $client->getSession(new \Ataccama\Common\Env\Prototypes\StringId($sessionId));

        \Tester\Assert::same($sessionId,$session->getId());
    }