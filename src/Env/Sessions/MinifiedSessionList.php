<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Env\Sessions;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Eye\Client\Env\Sessions\MinifiedSession;
    use Nette\SmartObject;


    /**
     * Class SessionList
     * @package Ataccama\Eye\Env\Sessions
     */
    class MinifiedSessionList extends BaseArray
    {
        use SmartObject;


        /**
         * @param MinifiedSession $session
         */
        public function add($session): self
        {
            parent::add($session);

            return $this;
        }

        /**
         * @return MinifiedSession
         */
        public function current(): MinifiedSession
        {
            return parent::current();
        }
    }