<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class MetadataList
     * @package Ataccama\Eye\Env\Activities
     */
    class MetadataList extends BaseArray
    {
        /**
         * @param Metadata $metadata
         */
        public function add($metadata): self
        {
            parent::add($metadata);

            return $this;
        }

        /**
         * @return Metadata|null
         */
        public function current(): ?Metadata
        {
            return parent::current();
        }

        public function toApiArray(): array
        {
            $data = [];
            foreach ($this as $metadata) {
                $data[] = $metadata->toArray();
            }

            return $data;
        }

        /**
         * @param string $key
         * @return Metadata|null
         */
        public function findKey(string $key): ?Metadata
        {
            foreach ($this as $metadata) {
                if ($metadata->getKey() == $key) {
                    return clone $metadata;
                }
            }

            return null;
        }
    }