<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Ataccama\Common\Utils\Comparator\Comparable;
    use Nette\Utils\DateTime;


    /**
     * Class Activity
     * @package Ataccama\Eye\Env\Activities
     * @property-read DateTime $dtCreated
     * @property-read int      $id
     */
    class Activity extends ActivityDefinition implements IdentifiableByInteger, Comparable, IArray
    {
        public readonly int $id;
        public readonly DateTime $dtCreated;
        public MetadataList $metadata;
        public ?string $countryCode;
        public ?IdentifiableByInteger $user;

        /**
         * Activity constructor.
         * @param int                   $id
         * @param DateTime              $dtCreated
         * @param IdentifiableByString $session
         * @param Type                  $type
         * @param string|null           $ipAddress
         */
        public function __construct(
            int $id,
            DateTime $dtCreated,
            IdentifiableByString $session,
            Type $type,
            ?string $ipAddress = null
        ) {
            parent::__construct($session, $type, $ipAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
            $this->metadata = new MetadataList();
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        public function getValue(): int
        {
            return $this->dtCreated->getTimestamp();
        }

        public function toArray(): array
        {
            return [
                "id"          => $this->id,
                "dtCreated"   => $this->dtCreated->getTimestamp(),
                "countryCode" => $this->countryCode,
                "type"        => $this->type->toArray(),
                "ipAddress"   => $this->ipAddress,
                "tags"        => $this->tags->toArray(),
                "metadata"    => $this->metadata->toArray()
            ];
        }

        public function getId(): int
        {
            return $this->id;
        }
    }