<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Products;

    use Nette\SmartObject;


    /**
     * Class Product
     * @package Ataccama\Eye\Env\Products
     * @property-read string $name
     */
    class ProductAccess
    {
        use SmartObject;


        public readonly string $name;

        /**
         * Product constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }
    }