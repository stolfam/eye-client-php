<?php
    declare(strict_types=1);

    namespace Env\Tags;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Common\Utils\Comparator\Sorter;


    /**
     * Class TagStats
     * @package Env\Tags
     */
    class TagStats extends BaseArray
    {
        /**
         * @param TagStat $tagStat
         * @return TagStats
         */
        public function add($tagStat): self
        {
            return parent::add($tagStat);
        }

        /**
         * @return TagStat|null
         */
        public function current(): ?TagStat
        {
            return parent::current();
        }

        /**
         * @param int $n
         * @return TagStats
         */
        public function listMostCommon(int $n = 1): TagStats
        {
            $tags = (clone $this)->sort(Sorter::DESC);
            $stats = new TagStats();
            foreach ($tags as $tag) {
                if ($n-- > 0) {
                    $stats->add($tag);
                }
            }

            return $stats;
        }

        /**
         * @return TagStat|null
         */
        public function getMostCommon(): ?TagStat
        {
            if ($this->count() > 0) {
                return $this->listMostCommon()
                    ->current();
            }

            return null;
        }

        /**
         * @return string[]
         */
        public function listNames(): array
        {
            $names = [];
            foreach ($this as $stat) {
                $names[] = $stat->name;
            }

            return $names;
        }
    }