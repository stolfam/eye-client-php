<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Env\Users\Consents;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ConsentTypeList
     * @package Ataccama\Eye\Env\Users\Consents
     */
    class ConsentTypeList extends BaseArray
    {
        /**
         * @param ConsentType $consentType
         * @return ConsentTypeList
         */
        public function add($consentType): self
        {
            $this->items[$consentType->id] = $consentType;

            return $this;
        }

        public function current(): ?ConsentType
        {
            return parent::current();
        }
    }