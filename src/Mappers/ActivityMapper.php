<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Mappers;

    use Ataccama\Common\Env\Entry;
    use Ataccama\Common\Env\Prototypes\IntegerId;
    use Ataccama\Common\Env\Prototypes\StringId;
    use Ataccama\Eye\Client\Env\Activities\Activity;
    use Ataccama\Eye\Client\Env\Activities\Metadata;
    use Ataccama\Eye\Client\Env\Activities\Type;
    use Ataccama\Eye\Client\Env\Tags\Tag;
    use Nette\Utils\DateTime;


    /**
     * Class ActivityMapper
     * @package Ataccama\Eye\Client\Mappers
     */
    final class ActivityMapper extends Mapper
    {
        protected function map(mixed $input, mixed &$output): void
        {
            $activity = new Activity($input->id, DateTime::from($input->dtCreated), new StringId($input->sessionId),
                new Type($input->type->id, $input->type->name), $input->ipAddress);
            if (!empty($input->country)) {
                $activity->countryCode = $input->country->iso2;
            }

            foreach ($input->tags as $tag) {
                $activity->tags->add(new Tag($tag->id, $tag->name));
            }

            foreach ($input->metadata as $metadata) {
                $activity->metadata->add(new Metadata($metadata->key, $metadata->value));
            }

            $output = $activity;
        }

        public function getObject(): Activity
        {
            return parent::getObject();
        }
    }