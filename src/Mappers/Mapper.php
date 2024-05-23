<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Mappers;

    /**
     * Class Mapper
     * @package Ataccama\Eye\Client\Mappers
     */
    abstract class Mapper
    {
        private mixed $result;

        /**
         * Mapper constructor.
         * @param \stdClass $response
         */
        public function __construct(\stdClass $response)
        {
            $this->map($response, $this->result);
        }

        abstract protected function map(mixed $input, mixed &$output): void;

        public function getObject(): mixed
        {
            return $this->result;
        }
    }