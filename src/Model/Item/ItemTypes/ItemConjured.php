<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;
use App\Model\Item\Item;

class ItemConjured extends AbstractItem
{
    /**
     * ItemProAging constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
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
