<?php

namespace App\Controller;

use App\Enum\ItemValueEnum;
use App\Model\ItemManager;

/**
 * Class GildedRose
 * @package App\Controller
 */
class GildedRose
{
    private $items = [];
    private $itemManager;

    public function __construct(ItemManager $itemManager)
    {
        $this->itemManager = $itemManager;
        $this->items = $itemManager->getArray();
    }

    public function loopUpdateQuality(int $days)
    {
        for ($i=0;$i<$days;$i++) {
            $this->itemManager->printOneDay($i);
            $this->updateQuality();
        }
    }

    /**
     * Updates each items quality and sell in values once
     * Items may be found in src/Model/Item/ItemTypes/*
     */
    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->process();
        }
    }
}
