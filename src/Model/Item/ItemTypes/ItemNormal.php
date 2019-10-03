<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;
use App\Model\Item\Item;

class ItemNormal extends AbstractItem
{
    /**
     * ItemProAging constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
    }

    public function __toString()
    {
        return parent::__toString();
    }

    public function process()
    {
        if ($this->isExpired()) {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*2);
        } else {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING);
        }
    }
}
