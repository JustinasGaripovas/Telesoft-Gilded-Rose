<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemLegendary extends AbstractItem
{
    public function process()
    {
        $this->quality = ItemValueEnum::QUALITY_LEGENDARY;
        $this->sell_in = 0;
    }
}
