<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\Name;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Nette\Utils\DateTime;


    /**
     * Class User
     * @package Ataccama\Eye\Env\Users
     * @property-read int      $id
     * @property-read DateTime $dtCreated
     */
    class User extends UserDefinition implements IdentifiableByInteger, IArray
    {
        public readonly int $id;
        public readonly DateTime $dtCreated;

        /**
         * User constructor.
         * @param int         $id
         * @param DateTime    $dtCreated
         * @param Name        $name
         * @param Email       $email
         * @param string|null $ipAddress
         */
        public function __construct(int $id, DateTime $dtCreated, Name $name, Email $email, string $ipAddress = null)
        {
            parent::__construct($name, $email, $ipAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        public function toArray(): array
        {
            $array = parent::toArray();
            $array["id"] = $this->id;

            return $array;
        }

        public function getId(): int
        {
            return $this->id;
        }
    }