<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Nette\Utils\DateTime;


    /**
     * Trait Person
     * @package Ataccama\Eye\Env\Users
     */
    trait Person
    {
        public Name $name;
        public Email $email;
        public ?string $organization = null;
        public ?string $jobTitle = null;
        public ?string $country = null;

        //        /** @var string */
        //        public $state;

        public ?string $city = null;

        //        /** @var string */
        //        public $street;
        //
        //        /** @var string */
        //        public $zipcode;
        public ?string $phone = null;

        //        /** @var DateTime */
        //        public $dtModified;
    }