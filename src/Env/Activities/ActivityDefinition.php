<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Ataccama\Eye\Client\Env\Tags\TagList;
    use Nette\SmartObject;


    /**
     * Class ActivityDefinition
     * @package Ataccama\Eye\Env\Activities
     * @property-read IdentifiableByString $session
     * @property-read Type                 $type
     * @property-read string|null          $ipAddress
     */
    class ActivityDefinition
    {
        use SmartObject;


        protected IdentifiableByString $session;
        protected Type $type;
        protected ?string $ipAddress;
        public TagList $tags;

        /**
         * ActivityDefinition constructor.
         * @param IdentifiableByString $session
         * @param Type                 $type
         * @param string|null          $ipAddress
         */
        public function __construct(IdentifiableByString $session, Type $type, ?string $ipAddress = null)
        {
            $this->session = $session;
            $this->type = $type;
            $this->ipAddress = $ipAddress;
            $this->tags = new TagList();
        }

        /**
         * @return IdentifiableByString
         */
        public function getSession(): IdentifiableByString
        {
            return $this->session;
        }

        /**
         * @return Type
         */
        public function getType(): Type
        {
            return $this->type;
        }

        /**
         * @return string|null
         */
        public function getIpAddress(): ?string
        {
            return $this->ipAddress;
        }
    }