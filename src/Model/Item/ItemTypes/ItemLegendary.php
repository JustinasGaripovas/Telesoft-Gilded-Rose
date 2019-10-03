<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;
use App\Model\Item\Item;

class ItemLegendary extends AbstractItem
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
        $this->quality = ItemValueEnum::QUALITY_LEGENDARY;
        $this->sell_in = 0;
    }
}
