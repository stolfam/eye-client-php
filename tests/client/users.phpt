<?php
    declare(strict_types=1);

    use Ataccama\Common\Env\Email;


    require __DIR__ . '/../bootstrap.php';

    // v4 test
    $client = new Ataccama\Eye\Client\Client(HOST, BEARER);

    $email = EXAMPLE_EMAIL;
    $emailUpdated = EXAMPLE_EMAIL . ".test";

    $userDef = new \Ataccama\Eye\Client\Env\Users\UserDefinition(new \Ataccama\Common\Env\Name("John Novak"),
        new Email($email), IP_ADDRESS);

    $userId = 0;

    try {
        $filter = new \Ataccama\Eye\Client\Env\Users\Filter([
            \Ataccama\Eye\Client\Env\Users\Filter::EMAIL => $email
        ]);
        $userId = $client->getUserId($filter);
    } catch (\Ataccama\Eye\Client\Exceptions\AtaccamaEyeApiError $e) {

    }

    try {
        $filter = new \Ataccama\Eye\Client\Env\Users\Filter([
            \Ataccama\Eye\Client\Env\Users\Filter::EMAIL => $emailUpdated
        ]);
        $userId = $client->getUserId($filter);
    } catch (\Ataccama\Eye\Client\Exceptions\AtaccamaEyeApiError $e) {

    }

    if ($userId == 0) {
        try {
            $user = $client->createUser($userDef);
            \Tester\Assert::same($email, $user->email->definition);

            $userId = $user->id;
        } catch (\Ataccama\Eye\Client\Exceptions\AtaccamaEyeApiError $ee) {

        }
    }

    if ($userId > 0) {
        $tmpUserFile = TEMP_USER;
        file_put_contents($tmpUserFile, json_encode([
            "userId" => $userId
        ]));

        try {
            $user = $client->getUser(new \Ataccama\Eye\Client\Env\Users\Filter([
                \Ataccama\Eye\Client\Env\Users\Filter::ID => $userId
            ]));

            \Tester\Assert::same($userId, $user->id);

            $user->email = new Email($emailUpdated);
            $userUpdated = $client->updateUser($user);

            \Tester\Assert::same($emailUpdated, $userUpdated->email->definition);
        } catch (\Ataccama\Eye\Client\Exceptions\AtaccamaEyeApiError $e) {
            // user does not exists or call failed
            echo "Error: " . $e->getMessage() . "\n";
        }
    }