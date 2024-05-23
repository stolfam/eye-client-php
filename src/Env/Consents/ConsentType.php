<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Env\Users\Consents;

    use Nette\SmartObject;


    /**
     * Class Consent
     * @package Ataccama\Eye\Env\Users\Consents
     * @property-read int    $id
     * @property-read string $name
     */
    class ConsentType
    {
        use SmartObject;


        public readonly int $id;
        public readonly string $name;

        /**
         * Consent constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            $this->id = $id;
            $this->name = $name;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }
    }