<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\Person;
    use Ataccama\Common\Interfaces\IdentifiableByString;


    /**
     * Class MinifiedSession
     * @package Ataccama\Eye\Env\Sessions
     * @property-read Person|null $user
     * @property-read string      $ipAddress
     */
    class MinifiedSession implements IdentifiableByString
    {
        public readonly string $id;
        protected string $ipAddress;

        /**
         * MinifiedSession constructor.
         * @param string $id
         * @param string $ipAddress
         */
        public function __construct(string $id, string $ipAddress)
        {
            $this->id = $id;
            $this->ipAddress = $ipAddress;
        }

        /**
         * @return string
         */
        public function getIpAddress(): string
        {
            return $this->ipAddress;
        }

        public function getId(): string
        {
            return $this->id;
        }
    }