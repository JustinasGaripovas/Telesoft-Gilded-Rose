<?php


namespace App\Model\Item\ItemTypes;



use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemLegendary extends AbstractItem
{
    /**
     *
     * Would want to make the array associative, but currently, thinking about leaving it as is to minimize data input complexity
     *
     * array[0] => name
     * array[1]=> sell_in
     * array[2]=> quality
     *
     * ItemProAging constructor.
     * @param $array
     */
    public function __construct($array)
    {
        parent::__construct($array[0], $array[1], $array[2]);
    }

    public function process()
    {
        $this->quality = ItemValueEnum::QUALITY_LEGENDARY;
        $this->sell_in = 0;
    }
}