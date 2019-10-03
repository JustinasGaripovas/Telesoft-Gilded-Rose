<?php

namespace App\Model\Item;

use App\Enum\ItemValueEnum;

abstract class AbstractItem extends Item
{
    /**
     * ItemProAging constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item->name, $item->sell_in, $item->quality);
    }

    public function __toString()
    {
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
     */
    protected function qualityModifier($qualityStep)
    {
        $this->sell_in += ItemValueEnum::SELL_IN_NORMAL_AGING;

        if ($this->quality + $qualityStep < ItemValueEnum::QUALITY_FLOOR) {
            $this->quality = ItemValueEnum::QUALITY_FLOOR;
        }

        if ($this->quality + $qualityStep > ItemValueEnum::QUALITY_CEILING) {
            $this->quality = ItemValueEnum::QUALITY_CEILING;
        }

        if ($this->quality + $qualityStep >= ItemValueEnum::QUALITY_FLOOR) {
            if ($this->quality + $qualityStep <= ItemValueEnum::QUALITY_CEILING) {
                $this->quality += $qualityStep;
            }
        }
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
