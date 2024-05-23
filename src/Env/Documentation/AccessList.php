<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Products;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ProductAccessList
     * @package Ataccama\Eye\Env\Products
     */
    class AccessList extends BaseArray
    {
        /**
         * @param ProductAccess $access
         */
        public function add($access): self
        {
            parent::add($access);

            return $this;
        }

        /**
         * @return ProductAccess|null
         */
        public function current(): ?ProductAccess
        {
            return parent::current();
        }
    }