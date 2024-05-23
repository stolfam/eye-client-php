<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class UserList
     * @package Ataccama\Eye\Env\Users
     */
    class UserList extends BaseArray
    {
        /**
         * @param User $user
         */
        public function add($user): self
        {
            $this->items[$user->id] = $user;

            return $this;
        }

        /**
         * @return User|null
         */
        public function current(): ?User
        {
            return parent::current();
        }
    }