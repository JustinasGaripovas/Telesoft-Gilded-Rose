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

    /**
     *  Having calculations/processes here is not entirely recommended.
     *  But for this current project, I don't think these processes being here will be a cause for concern
     *  If we would follow MVC developing patterns, the best option would be to each class's calculations/processes
     *  In controller or separate service.
     */

    abstract public function process();

    /**
     * Simple quality / sell in value modifier with constrains
     *
     * @param $qualityStep
     * @param $sellInStep
     */
    protected function valueModifier($qualityStep, $sellInStep)
    {
        $this->sell_in += $sellInStep;

        if($this->quality + $qualityStep < ItemValueEnum::QUALITY_FLOOR)
            $this->quality = ItemValueEnum::QUALITY_FLOOR;

        if($this->quality + $qualityStep > ItemValueEnum::QUALITY_CEILING)
            $this->quality = ItemValueEnum::QUALITY_CEILING;

        if ($this->quality + $qualityStep >= ItemValueEnum::QUALITY_FLOOR)
            if ($this->quality + $qualityStep <= ItemValueEnum::QUALITY_CEILING)
                $this->quality += $qualityStep;
    }

    /**
     * Expiration function, also adapted to fit EVENT day checking tasks
     *
     * @param int $dayOffset
     * @return bool
     */
    protected function isExpired($dayOffset = 0): bool
    {
        return $this->sell_in < $dayOffset;
    }
}