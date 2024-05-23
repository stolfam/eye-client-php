<?php
    declare(strict_types=1);

    namespace Env\Tags;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class TagListKey
     * @package Env\Tags
     */
    readonly final class TagListKey implements IKey
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
            return "eye_api_tags";
        }
    }