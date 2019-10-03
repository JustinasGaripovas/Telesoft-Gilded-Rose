<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;
use App\Model\Item\Item;

class ItemProAging extends AbstractItem
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
        $this->qualityModifier(ItemValueEnum::QUALITY_PRO_AGING_AGING);
    }
}