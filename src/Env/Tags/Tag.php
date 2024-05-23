<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Tags;

    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;


    /**
     * Class Tag
     * @package Ataccama\Eye\Env\Tags
     * @property-read int $id
     */
    class Tag extends TagDefinition implements IdentifiableByInteger, IArray
    {
        public readonly int $id;

        /**
         * Tag constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            parent::__construct($name);
            $this->id = $id;
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