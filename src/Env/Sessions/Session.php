<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Ataccama\Eye\Client\Env\Activities\ActivityList;
    use Nette\Utils\DateTime;


    /**
     * Class Session
     * @package Ataccama\Eye\Env\Activities
     * @property-read DateTime $dtCreated
     * @property-read string   $id
     */
    class Session extends SessionDefinition implements IdentifiableByString, IArray
    {
        public readonly string $id;
        public readonly DateTime $dtCreated;
        public ActivityList $activities;

        /**
         * Session constructor.
         * @param string                     $id
         * @param DateTime                   $dtCreated
         * @param DateTime                   $dtExpired
         * @param string                     $ipAddress
         * @param IdentifiableByInteger|null $user
         */
        public function __construct(
            string $id,
            DateTime $dtCreated,
            DateTime $dtExpired,
            string $ipAddress,
            IdentifiableByInteger $user = null
        ) {
            parent::__construct($ipAddress, $user);
            $this->dtCreated = $dtCreated;
            $this->id = $id;
            $this->dtExpired = $dtExpired;
            $this->activities = new ActivityList();
        }

        public function toArray(): array
        {
            return [
                "id"         => $this->id,
                "dtCreated"  => $this->dtCreated->getTimestamp(),
                "activities" => $this->activities->toArray()
            ];
        }

        public function toApiArray(): array
        {
            return [
                "id"         => $this->id,
                "dtCreated"  => $this->dtCreated->getTimestamp(),
                "activities" => $this->activities->toApiArray()
            ];
        }

        public function getId(): string
        {
            return $this->id;
        }
    }