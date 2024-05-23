<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Prototypes\StringId;
    use Ataccama\Common\Exceptions\NotDefined;
    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Nette\InvalidArgumentException;
    use Nette\Utils\Validators;


    /**
     * Class Filter
     * @package Ataccama\Eye\Client\Env\Users
     */
    class Filter
    {
        const EMAIL = "email";
        const KEYCLOAK_ID = "keycloak_id";
        const ID = "user_id";
        const SESSION = "session_id";

        public ?Email $email;
        public ?int $id;
        public ?IdentifiableByString $session;
        public ?string $keycloakId;

        /**
         * Filter constructor.
         * @param array $params
         * @throws NotDefined
         */
        public function __construct(array $params)
        {
            $defined = false;

            // email
            if (isset($params[self::EMAIL])) {
                if ($params[self::EMAIL] instanceof Email) {
                    $this->email = $params[self::EMAIL];
                } elseif (Validators::isEmail($params[self::EMAIL])) {
                    $this->email = new Email($params[self::EMAIL]);
                } else {
                    throw new InvalidArgumentException("Invalid parameter EMAIL. Must be valid an e-mail address or an object of the class Email.");
                }
                $defined = true;
            }

            // id
            if (isset($params[self::ID])) {
                if (Validators::isNumericInt($params[self::ID])) {
                    $this->id = $params[self::ID];
                } else {
                    throw new InvalidArgumentException("Invalid parameter ID. Must be an integer.");
                }
                $defined = true;
            }

            // id
            if (isset($params[self::KEYCLOAK_ID])) {
                if (!empty(self::KEYCLOAK_ID)) {
                    $this->keycloakId = $params[self::KEYCLOAK_ID];
                } else {
                    throw new InvalidArgumentException("Invalid parameter KEYCLOAK_ID. Must be a string.");
                }
                $defined = true;
            }

            // session
            if (isset($params[self::SESSION])) {
                if ($params[self::SESSION] instanceof IdentifiableByString) {
                    $this->session = $params[self::SESSION];
                } elseif (!empty(self::SESSION)) {
                    $this->session = new StringId($params[self::SESSION]);
                } else {
                    throw new InvalidArgumentException("Invalid parameter SESSION. Must be valid an object of the interface IEntry.");
                }
                $defined = true;
            }

            if (!$defined) {
                throw new NotDefined("At least one parameter must be set.");
            }
        }

        public function __toString(): string
        {
            $str = "";
            if (!empty($this->id)) {
                $str .= "id=$this->id";
            }
            if (!empty($this->email)) {
                $str .= "e=$this->email";
            }
            if (!empty($this->session)) {
                $str .= "sid=" . $this->session->id;
            }
            if (!empty($this->keycloakId)) {
                $str .= "kid=$this->keycloakId";
            }

            return md5(sha1($str));
        }
    }