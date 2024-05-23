<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;


    /**
     * Class ActivityTypeDefinition
     * @package Ataccama\Eye\Env\Activities
     */
    class TypeDefinition
    {
        public string $name;

        /**
         * ActivityTypeDefinition constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    }