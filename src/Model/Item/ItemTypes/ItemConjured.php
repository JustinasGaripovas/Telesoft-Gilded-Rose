<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemConjured extends AbstractItem
{
    public function process()
    {
        if ($this->isExpired()) {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*4);
        } else {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*2);
        }
    }
}
