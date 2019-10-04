<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemNormal extends AbstractItem
{
    public function process()
    {
        if ($this->isExpired()) {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING*2);
        } else {
            $this->qualityModifier(ItemValueEnum::QUALITY_NORMAL_AGING);
        }
    }
}
