<?php

namespace App\Enum;

use App\Model\Item\ItemTypes\ItemConjured;
use App\Model\Item\ItemTypes\ItemEventPass;
use App\Model\Item\ItemTypes\ItemLegendary;
use App\Model\Item\ItemTypes\ItemProAging;
use phpDocumentor\Reflection\Types\This;

/**
 * Class ItemTypeEnum
 * @package App\Enum
 */
class ItemTypeEnum
{
    const CONJURED=['Conjured'];
    const PRO_AGING=['Aged Brie'];
    const LEGENDARY=['Sulfuras'];
    const EVENT_PASS=['Backstage passes'];

    const RELATIONS = [
        ["array" => self::PRO_AGING, "class" => ItemProAging::class],
        ["array" => self::EVENT_PASS, "class" => ItemEventPass::class],
        ["array" => self::LEGENDARY, "class" => ItemLegendary::class],
        ["array" => self::CONJURED, "class" => ItemConjured::class]
    ];
}
