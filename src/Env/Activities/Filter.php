<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Exceptions\NotDefined;
    use Nette\Utils\DateTime;
    use Nette\Utils\Validators;


    /**
     * Class ActivityFilter
     * @package Ataccama\Eye\Env\Activities
     */
    class Filter
    {
        const EMAIL = "email";
        const IP_ADDRESS = "ip_address";
        const CONTINENTS = "continents";
        const METADATA_SEARCH = "metadata_search";

        public ?Email $email;
        public ?string $ipAddress;

        /** @var int[] */
        public array $typeIds;

        /** @var string[] */
        public array $continents;
        public DateTime $dtFrom;
        public DateTime $dtTo;
        public ?MetadataSearch $metadataSearch;

        /**
         * ActivityFilter constructor.
         * @param DateTime $from
         * @param DateTime $to
         * @param int[]    $activityTypeIds
         * @param array    $options
         * @throws NotDefined
         */
        public function __construct(DateTime $from, DateTime $to, array $activityTypeIds, array $options = [])
        {
            $this->dtFrom = $from;
            $this->dtTo = $to;

            // optional
            if (isset($options[self::EMAIL]) && $options[self::EMAIL] instanceof Email) {
                $this->email = $options[self::EMAIL];
            } elseif (!empty($options[self::EMAIL])) {
                $this->email = new Email($options[self::EMAIL]);
            }
            if (isset($options[self::IP_ADDRESS]) && !empty($options[self::IP_ADDRESS])) {
                $this->ipAddress = $options[self::IP_ADDRESS];
            }
            if (isset($options[self::METADATA_SEARCH]) && !empty($options[self::METADATA_SEARCH])) {
                $this->metadataSearch = $options[self::METADATA_SEARCH];
            }
            if (!empty($activityTypeIds)) {
                foreach ($activityTypeIds as $typeId) {
                    if (Validators::isNumericInt($typeId)) {
                        $this->typeIds[] = $typeId;
                    }
                }
            } else {
                throw new NotDefined("Activity Type IDs MUST be set.");
            }
            if (isset($options[self::CONTINENTS]) && is_array($options[self::CONTINENTS])) {
                $this->continents[] = $options[self::CONTINENTS];
            }
        }

        public function __toString(): string
        {
            $str = "";
            if (!empty($this->ipAddress)) {
                $str .= "ip=" . $this->ipAddress;
            }
            if (!empty($this->metadataSearch)) {
                $str .= "s=" . $this->metadataSearch->key . "|" . $this->metadataSearch->value;
            }
            if (!empty($this->email)) {
                $str .= "e=" . $this->email->definition;
            }
            if (!empty($this->dtFrom)) {
                $str .= "dtF=" . $this->dtFrom->format("Ymd");
            }
            if (!empty($this->dtTo)) {
                $str .= "dtT=" . $this->dtTo->format("Ymd");
            }
            if (!empty($this->typeIds)) {
                $str .= "a=" . implode(",", $this->typeIds);
            }
            if (!empty($this->continents)) {
                $str .= "c=" . implode(",", $this->continents);
            }

            return md5(sha1($str));
        }
    }