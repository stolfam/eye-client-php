<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Exceptions\NotDefined;
    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Common\Utils\Cache\Key;
    use Ataccama\Eye\Client\Env\Users\User;


    /**
     * Class UserKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    readonly class UserKey implements IKey
    {
        public string $id;

        /**
         * @param int $id
         */
        public function __construct(int $id)
        {
            $this->id = (string) $id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_user";
        }

        /**
         * @param User $user
         * @return IKey
         * @throws NotDefined
         */
        public static function keycloakKey(User $user): IKey
        {
            if (!empty($user->keycloakId)) {
                return new Key($user->keycloakId, UserFilterKey::PREFIX);
            }

            throw new NotDefined("Key cannot be defined.");
        }

        /**
         * @param IdentifiableByString $session
         * @return IKey
         */
        public static function sessionKey(IdentifiableByString $session): IKey
        {
            return new Key($session->id, UserFilterKey::PREFIX);
        }

        /**
         * @param User $user
         * @return IKey
         */
        public static function emailKey(User $user): IKey
        {
            return new Key($user->email->definition, UserFilterKey::PREFIX);
        }

        public function getId(): string
        {
            return $this->id;
        }
    }