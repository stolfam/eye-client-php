<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Mappers;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Ataccama\Eye\Client\Env\Products\ProductAccess;
    use Ataccama\Eye\Client\Env\Sessions\MinifiedSession;
    use Ataccama\Eye\Client\Env\Support\Type;
    use Ataccama\Eye\Client\Env\Users\Profile;
    use Ataccama\Eye\Client\Env\Users\User;
    use Ataccama\Eye\Env\Users\Consents\Consent;
    use Ataccama\Eye\Env\Users\Consents\ConsentType;
    use Env\Tags\TagStat;
    use Nette\Utils\DateTime;


    /**
     * Class UserMapper
     * @package Ataccama\Eye\Client\Mappers
     */
    class ProfileMapper extends Mapper
    {
        /**
         * @return Profile
         */
        public function getObject(): Profile
        {
            return parent::getObject();
        }

        protected function map(mixed $input, mixed &$output): void
        {
            $user = new User($input->id, DateTime::from($input->dtCreated), new Name($input->name),
                new Email($input->email), $input->ipAddress);
            $user->country = $input->country;
            $user->city = $input->city;
            $user->keycloakId = $input->keycloakId;
            $user->organization = $input->organization;
            $user->phone = $input->phone;
            $user->jobTitle = $input->jobTitle;

            $profile = Profile::create($user);

            if (isset($input->sessions)) {
                foreach ($input->sessions as $session) {
                    $profile->sessions->add(new MinifiedSession($session->id, $session->ipAddress));
                }
            }

            if (isset($input->consents)) {
                foreach ($input->consents as $consent) {
                    $profile->consents->add(new Consent(new ConsentType($consent->type->id, $consent->type->name),
                        DateTime::from($consent->ts)));
                }
            }

            foreach ($input->documentation as $documentation) {
                $profile->documentation->add(new ProductAccess($documentation));
            }

            $profile->support = $input->support == "None" ? Type::none() : Type::paid();

            foreach ($input->tags as $tag) {
                $profile->tags->add(new TagStat($tag->name, $tag->count));
            }

            $output = $profile;
        }
    }