<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;


    /**
     * Class ActivityType
     * @package Ataccama\Eye\Env\Activities
     * @property-read int $id
     */
    class Type extends TypeDefinition implements IdentifiableByInteger, IPair, IArray
    {
        public readonly int $id;

        /**
         * ActivityType constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            parent::__construct($name);
            $this->id = $id;
        }

        public function getKey(): int
        {
            return $this->id;
        }

        public function getValue(): string
        {
            return $this->name;
        }

        public function toArray(): array
        {
            return [
                "id"   => $this->id,
                "name" => $this->name
            ];
        }

        public function getId(): int
        {
            return $this->id;
        }
    }