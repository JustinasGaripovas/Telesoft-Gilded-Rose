<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemProAging extends AbstractItem
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
        $this->valueModifier(ItemValueEnum::QUALITY_PRO_AGING_AGING,ItemValueEnum::SELL_IN_NORMAL_AGING);
    }
}