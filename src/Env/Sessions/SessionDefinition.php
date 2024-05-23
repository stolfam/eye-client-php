<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Nette\Utils\DateTime;


    /**
     * Class SessionDefinition
     * @package Ataccama\Eye\Env\Activities
     */
    class SessionDefinition
    {
        public ?IdentifiableByInteger $user;
        public string $ipAddress;
        public DateTime $dtExpired;

        /**
         * SessionDefinition constructor.
         * @param IdentifiableByInteger|null $user
         * @param string                     $ipAddress
         */
        public function __construct(string $ipAddress, ?IdentifiableByInteger $user = null)
        {
            $this->user = $user;
            $this->ipAddress = $ipAddress;
            $this->dtExpired = DateTime::from("+1 year");
        }
    }