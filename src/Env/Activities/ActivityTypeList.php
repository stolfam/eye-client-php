<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ActivityTypeList
     * @package Ataccama\Eye\Client\Env\Activities
     */
    class ActivityTypeList extends BaseArray
    {
        /**
         * @param Type $type
         */
        public function add($type): self
        {
            $this->items[$type->getKey()] = $type->getValue();

            return $this;
        }

        /**
         * @return Type|null
         */
        public function current(): ?Type
        {
            return parent::current();
        }
    }