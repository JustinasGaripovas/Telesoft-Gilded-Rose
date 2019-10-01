<?php


namespace App\Model\Item;


use App\Enum\ItemValueEnum;

abstract class AbstractItem
{
    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    abstract public function process();

    protected function valueModifier($qualityStep, $sellInStep)
    {
        $this->sell_in = $this->sell_in + $sellInStep;

        if ($this->quality + $qualityStep < ItemValueEnum::QUALITY_FLOOR) {
            $this->quality = 0;
            return;
        }

        if ($this->quality + $qualityStep < ItemValueEnum::QUALITY_CEILING) {
            $this->quality = $this->quality + $qualityStep;
        }else{
            $this->quality = ItemValueEnum::QUALITY_CEILING;
        }
    }

    protected function isExpired($dayOffset = 0): bool
    {
        return $this->sell_in < $dayOffset;
    }
}