<?php

namespace App\Model\Item\ItemTypes;

use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemProAging extends AbstractItem
{
    public function process()
    {
        $this->qualityModifier(ItemValueEnum::QUALITY_PRO_AGING_AGING);
    }
}