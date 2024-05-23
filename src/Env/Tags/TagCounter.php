<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Tags;

    use Ataccama\Common\Env\Pair;
    use Ataccama\Common\Env\PairArray;
    use Ataccama\Eye\Client\Env\Activities\ActivityList;
    use Nette\SmartObject;


    /**
     * Class TagCounter
     * @package Ataccama\Environment\Activities
     * @property-read PairArray $list
     */
    class TagCounter
    {
        use SmartObject;


        /** @var int[] */
        private array $stats = [];

        /**
         * TagCounter constructor.
         * @param ActivityList $activities
         */
        public function __construct(ActivityList $activities)
        {
            $tags = [];
            $activities = clone $activities;
            foreach ($activities as $activity) {
                foreach ($activity->tags as $tag) {
                    $tags[] = $tag;
                }
            }

            foreach ($tags as $tag) {
                if (!isset($this->stats[$tag->name])) {
                    $this->stats[$tag->name] = 0;
                }

                $this->stats[$tag->name]++;
            }
        }

        /**
         * @return PairArray
         */
        public function getList(): PairArray
        {
            $pairArray = new PairArray();

            foreach ($this->stats as $tag => $count) {
                $pairArray->add(new Pair($tag, $count));
            }

            return $pairArray;
        }
    }