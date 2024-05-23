<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Tags;


    /**
     * Class TagDefinition
     * @package Ataccama\Eye\Env\Tags
     */
    class TagDefinition
    {
        public string $name;

        /**
         * TagDefinition constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    }