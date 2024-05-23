<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\IArray;
    use Nette\Utils\Validators;


    /**
     * Class Metadata
     * @package Ataccama\Eye\Env\Activities
     * @property-read string|null $url
     */
    class Metadata extends MetadataDefinition implements IArray
    {
        protected ?string $url;

        /**
         * @return string|null
         */
        public function getUrl(): ?string
        {
            if (isset($this->url)) {
                return $this->url;
            }

            if (Validators::isEmail($this->value)) {
                // $value is an e-mail
                $this->url = "https://eye.ataccama.com/user/" . $this->value;

            } elseif (preg_match("~(^http[s]?://)?(www\.)?([a-zA-Z0-9]+)\.([a-z]{2,})\/?[a-zA-Z0-9\.\-\_\#\?\=\/\&]*$~i",
                $this->value)) {
                // $value is an url
                $this->url = $this->value;

            } elseif (preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/",
                $this->value)) {
                // $value is IP address
                $this->url = "https://eye.ataccama.com/ip/" . $this->value;
            } else {
                return null;
            }

            return $this->url;
        }

        public function toArray(): array
        {
            return [
                "key"   => $this->key,
                "value" => $this->value,
                "url"   => $this->getUrl()
            ];
        }
    }