<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemEventPass extends AbstractItem
{
    public function process()
    {
        if ($this->isExpired()) {
            $this->quality = 0;
            $this->qualityModifier(0);
            return;
        } elseif ($this->isExpired(ItemValueEnum::SELL_IN_EVENT_RANGES[0])) {
            $this->qualityModifier(ItemValueEnum::QUALITY_EVENT_VALUE[0]);
            return;
        } elseif ($this->isExpired(ItemValueEnum::SELL_IN_EVENT_RANGES[1])) {
            $this->qualityModifier(ItemValueEnum::QUALITY_EVENT_VALUE[1]);
            return;
        } else {
            $this->qualityModifier(ItemValueEnum::QUALITY_EVENT_VALUE_DEFAULT);
        }
    }
}
