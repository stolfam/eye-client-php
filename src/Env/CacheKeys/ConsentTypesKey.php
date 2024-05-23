<?php
    declare(strict_types=1);

    namespace Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class ConsentTypesKey
     * @package Env\CacheKeys
     */
    readonly class ConsentTypesKey implements IKey
    {
        public string $id;

        /**
         * ActivityListKey constructor.
         */
        public function __construct()
        {
            $this->id = "all";
        }

        public function getId(): string
        {
            return $this->id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_consent_types";
        }
    }