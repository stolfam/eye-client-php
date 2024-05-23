<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Eye\Client\Env\Activities\Filter;


    /**
     * Class ActivityListKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    readonly class ActivityListKey implements IKey
    {
        public string $id;

        /**
         * ActivityListKey constructor.
         * @param Filter $filter
         */
        public function __construct(Filter $filter)
        {
            $this->id = "$filter";
        }

        public function getId(): string
        {
            return $this->id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_activities";
        }
    }