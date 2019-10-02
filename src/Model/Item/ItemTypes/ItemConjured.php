<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemConjured extends AbstractItem
{
    /**
     * Would want to make the array associative, but currently, thinking about leaving it as is, to maintain original input methods
     *
     * array[0] => name
     * array[1]=> sell_in
     * array[2]=> quality
     *
     * ItemProAging constructor.
     * @param $array
     */
    public function __construct($array)
    {
        parent::__construct($array[0], $array[1], $array[2]);
    }

    public function process()
    {
        if ($this->isExpired()) {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*4);
        } else {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*2);
        }
    }
}
