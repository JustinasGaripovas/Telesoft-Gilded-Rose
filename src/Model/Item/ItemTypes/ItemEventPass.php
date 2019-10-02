<?php


namespace App\Model\Item\ItemTypes;



use App\Enum\ItemValueEnum;
use App\Model\Item\AbstractItem;

class ItemEventPass extends AbstractItem
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
        if($this->isExpired()){
            $this->quality = 0;
            $this->valueModifier(0, ItemValueEnum::SELL_IN_NORMAL_AGING);
            return;
        }
        elseif ($this->isExpired(ItemValueEnum::SELL_IN_EVENT_RANGES[0])) {
            $this->valueModifier(ItemValueEnum::QUALITY_EVENT_VALUE[0], ItemValueEnum::SELL_IN_NORMAL_AGING);
            return;
        }
        elseif($this->isExpired(ItemValueEnum::SELL_IN_EVENT_RANGES[1])){
            $this->valueModifier(ItemValueEnum::QUALITY_EVENT_VALUE[1], ItemValueEnum::SELL_IN_NORMAL_AGING);
            return;
        }else{
            $this->valueModifier(ItemValueEnum::QUALITY_EVENT_VALUE_DEFAULT, ItemValueEnum::SELL_IN_NORMAL_AGING);
        }

    }
}