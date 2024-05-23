<?php
    declare(strict_types=1);

    namespace Ataccama\Eye\Client\Env\Tags;

    use Ataccama\Common\Env\BaseArray;
    use Nette\Utils\Strings;


    /**
     * Class TagList
     * @package Ataccama\Eye\Env\Tags
     */
    class TagList extends BaseArray
    {
        /**
         * @param Tag $tag
         */
        public function add($tag): self
        {
            $this->items[$tag->id] = $tag;

            return $this;
        }

        /**
         * @return Tag
         */
        public function current(): Tag
        {
            return parent::current();
        }

        public function toArray(): array
        {
            $tags = [];
            foreach ($this as $tag) {
                $tags[] = $tag->toArray();
            }

            return $tags;
        }

        /**
         * @param string $text
         * @return TagList
         */
        public function findAppropriateTags(string $text): TagList
        {
            $tags = new TagList();
            $text = strtolower($text);

            foreach ($this as $tag) {
                $tag->name = strtolower(str_replace("-", "_", $tag->name));
                $exploded = explode("_", $tag->name);
                $count = count($exploded);
                foreach ($exploded as $tagPart) {
                    if (!empty($tagPart)) {
                        if (Strings::contains($text, $tagPart)) {
                            $count--;
                        }
                    }
                }
                if ($count == 0) {
                    $tags->add($tag);
                }
            }

            return $tags;
        }
    }