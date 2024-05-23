<?php

    namespace Ataccama\Eye\Client\Env\Support;

    use Ataccama\Common\Env\IArray;
    use Nette\SmartObject;


    /**
     * Class Type
     * @package Ataccama\Eye\Env\Support
     * @property-read string $name
     * @property-read bool   $active
     */
    class Type implements IArray
    {
        use SmartObject;

        const NONE = 0;
        const PAID = 1;

        /** @var string */
        protected $name;

        /** @var bool */
        protected $active;

        /**
         * Type constructor.
         * @param string $name
         * @param bool   $active
         */
        public function __construct(string $name, bool $active = false)
        {
            $this->name = $name;
            $this->active = $active;
        }

        /**
         * @return Type
         */
        public static function none(): Type
        {
            return new Type("None");
        }

        /**
         * @return Type
         */
        public static function paid(): Type
        {
            return new Type("Paid", true);
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return bool
         */
        public function isActive(): bool
        {
            return $this->active;
        }

        public function toArray(): array
        {
            return [
                "name"   => $this->name,
                "active" => $this->active
            ];
        }
    }