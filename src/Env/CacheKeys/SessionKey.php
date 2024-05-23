<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class SessionKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    readonly class SessionKey implements IKey
    {
        public string $id;

        /**
         * @param string $id
         */
        public function __construct(string $id)
        {
            $this->id = $id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_session";
        }

        public function getId(): string
        {
            return $this->id;
        }
    }