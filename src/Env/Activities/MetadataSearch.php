<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    /**
     * Class MetadataSearch
     * @package Ataccama\Eye\Client\Env\Activities
     * @property-read string|null $key
     * @property-read string      $value
     */
    class MetadataSearch
    {
        public readonly string $value;
        public readonly ?string $key;

        /**
         * MetadataSearch constructor.
         * @param string      $value
         * @param string|null $key
         */
        public function __construct(string $value, ?string $key)
        {
            $this->value = $value;
            $this->key = $key;
        }

        /**
         * @return string
         */
        public function getValue(): string
        {
            return $this->value;
        }

        /**
         * @return string|null
         */
        public function getKey(): ?string
        {
            return $this->key;
        }
    }