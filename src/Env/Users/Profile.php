<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Ataccama\Eye\Client\Env\Support\Type;
    use Ataccama\Eye\Client\Env\Products\AccessList;
    use Ataccama\Eye\Env\Sessions\MinifiedSessionList;
    use Ataccama\Eye\Env\Users\Consents\ConsentList;
    use Env\Tags\TagStats;
    use Nette\Utils\DateTime;


    /**
     * Class Profile
     * @package Ataccama\Eye\Env\User
     */
    class Profile extends User
    {
        public MinifiedSessionList $sessions;
        public AccessList $documentation;
        public Type $support;
        public TagStats $tags;
        public ConsentList $consents;

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
            parent::__construct($id, $dtCreated, $name, $email, $ipAddress);
            $this->sessions = new MinifiedSessionList();
            $this->support = Type::none();
            $this->documentation = new AccessList();
            $this->tags = new TagStats();
            $this->consents = new ConsentList();
        }

        /**
         * @param User $user
         * @return Profile
         */
        public static function create(User $user): Profile
        {
            $profile = new Profile($user->id, $user->dtCreated, $user->name, $user->email, $user->ipAddress);
            $profile->industry = $user->industry;
            $profile->keycloakId = $user->keycloakId;
            $profile->emailUpdates = $user->emailUpdates;
            $profile->acceptedTerms = $user->acceptedTerms;
            //            $profile->dtModified = $user->dtModified;
            $profile->phone = $user->phone;
            //            $profile->zipcode = $user->zipcode;
            //            $profile->street = $user->street;
            //            $profile->state = $user->state;
            $profile->city = $user->city;
            $profile->country = $user->country;
            $profile->organization = $user->organization;
            $profile->jobTitle = $user->jobTitle;

            return $profile;
        }

        public function toArray(): array
        {
            $profile = parent::toArray();
            $profile['keycloakId'] = $this->keycloakId;
            $profile['organization'] = $this->organization;
            $profile['jobTitle'] = $this->jobTitle;
            $profile['phone'] = $this->phone;

            return $profile;
        }
    }