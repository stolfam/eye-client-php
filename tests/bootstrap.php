<?php
    require __DIR__ . '/../vendor/autoload.php';

    Tester\Environment::setup();
    date_default_timezone_set('Europe/Prague');

    // type into terminal to start: vendor/bin/tester tests/

    const IP_ADDRESS = "localhost";

    const TEMP_DIR = __DIR__ . "/../tmp";
    const TEMP_SESSION = TEMP_DIR . "/session";
    const TEMP_USER = TEMP_DIR . "/user.json";

    if (!file_exists(TEMP_DIR)) {
        mkdir(TEMP_DIR);
    }

    $configPath = __DIR__ . "/../tmp/config.json";

    if (!file_exists($configPath)) {
        file_put_contents($configPath, json_encode([
            "host"         => "",
            "bearer"       => "",
            "exampleEmail" => "",
        ]));
    }

    $config = json_decode(file_get_contents($configPath));

    define("HOST", (string) $config->host);
    define("BEARER", (string) $config->bearer);
    define("EXAMPLE_EMAIL", (string) $config->exampleEmail);

    if (!file_exists(TEMP_SESSION)) {
        $client = new Ataccama\Eye\Client\Client(HOST, BEARER);
        $sessionDefinition = new \Ataccama\Eye\Client\Env\Sessions\SessionDefinition(IP_ADDRESS);
        $session = $client->createSession($sessionDefinition);
        define("SESSION_ID", $session->id);
        file_put_contents(TEMP_SESSION, $session->id);
    } else {
        define("SESSION_ID", file_get_contents(TEMP_SESSION));
    }