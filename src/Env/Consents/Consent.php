<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Env\Users\Consents;

    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class GivenConsent
     * @package Ataccama\Eye\Env\Users\Consents
     * @property-read DateTime    $date
     * @property-read ConsentType $type
     */
    class Consent
    {
        use SmartObject;


        public readonly DateTime $date;
        public readonly ConsentType $type;

        /**
         * GivenConsent constructor.
         * @param ConsentType $type
         * @param DateTime    $date
         */
        public function __construct(ConsentType $type, DateTime $date)
        {
            $this->type = $type;
            $this->date = $date;
        }

        /**
         * @return DateTime
         */
        public function getDate(): DateTime
        {
            return $this->date;
        }

        /**
         * @return ConsentType
         */
        public function getType(): ConsentType
        {
            return $this->type;
        }
    }