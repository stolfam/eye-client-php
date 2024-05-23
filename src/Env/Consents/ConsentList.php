<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Env\Users\Consents;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class GivenConsentList
     * @package Ataccama\Eye\Env\Users\Consents
     */
    class ConsentList extends BaseArray
    {
        /**
         * @param Consent $consent
         * @return ConsentList
         */
        public function add($consent): self
        {
            $this->items[$consent->type->id] = $consent;

            return $this;
        }

        /**
         * @return Consent|null
         */
        public function current(): ?Consent
        {
            return parent::current();
        }

        /**
         * @param int $consentTypeId
         * @return bool
         */
        public function contains(int $consentTypeId): bool
        {
            return isset($this->items[$consentTypeId]);
        }
    }