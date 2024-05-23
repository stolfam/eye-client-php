<?php

    namespace Ataccama\Eye\Client\Env\LookUp;

    /**
     * Class IpAddressDetail
     * @package Ataccama\Eye\Client\Env\LookUp
     */
    final class IpAddressDetail
    {
        /** @var string|null */
        public $countryCode;

        /** @var string|null */
        public $countryName;

        /** @var string|null */
        public $city;

        /** @var string|null */
        public $timeZone;

        /**
         * IpAddressDetail constructor.
         * @param string|null $countryCode
         * @param string|null $countryName
         * @param string|null $city
         * @param string|null $timeZone
         */
        public function __construct(?string $countryCode, ?string $countryName, ?string $city, ?string $timeZone)
        {
            $this->countryCode = $countryCode;
            $this->countryName = $countryName;
            $this->city = $city;
            $this->timeZone = $timeZone;
        }
    }