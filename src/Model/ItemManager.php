<?php

namespace App\Model;

use App\Enum\ItemTypeEnum;
use App\Model\Item\ItemTypes\ItemConjured;
use App\Model\Item\ItemTypes\ItemEventPass;
use App\Model\Item\ItemTypes\ItemLegendary;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\Item\ItemTypes\ItemProAging;

class ItemManager
{
    private $items = [];

    public function __construct()
    {

    }

    public function loadItems(): array
    {
        $this->initializeItems();
        $this->assignItemType();
        return $this->items;
    }

    public function printOneDay($day)
    {
        echo("-------- Day $day --------\n");
        echo("name, sellIn, quality\n");
        foreach ($this->items as $item) {
            echo $item . PHP_EOL;
        }
        echo PHP_EOL;
    }

    // Might make them JSON format
    private function initializeItems(){
        $this->items = array(
            ['+5 Dexterity Vest', 10, 20],
           ['Sulfuras', 2, 0],
           ['Aged Brie', 2, 0],
           ['Elixir of the Mongoose', 5, 7],
           ['Elixir of the Mongoose', 5, 7],
           ['Sulfuras, Hand of Ragnaros', 0, 80],
           ['Sulfuras, Hand of Ragnaros', 0, 80],
           ['Sulfuras, Hand of Ragnaros', 0, 80],
           ['Sulfuras, Hand of Ragnaros', 0, 80],
           ['Sulfuras, Hand of Ragnaros', -1, 80],
           ['Backstage passes to a TAFKAL80ETC concert', 15, 20],
           ['Backstage passes to a TAFKAL80ETC concert', 10, 49],
           ['Backstage passes to a TAFKAL80ETC concert', 5, 49],
           ['Conjured Mana Cake', 3, 6]
        );
    }

    private function assignItemType()
    {
        $temporaryArray = [];

        foreach ($this->items as $item)
            $temporaryArray[] = $this->guessType($item);

        $this->items = $temporaryArray;
    }

    // Need to make constraints to allow return on ITEM TYPE objects
    private function guessType(array $item)
    {
        foreach (ItemTypeEnum::PRO_AGING as $name)
        {
            if ($this->contains($item[0], $name))
                return new ItemProAging($item);
        }
        foreach (ItemTypeEnum::EVENT_PASS as $name)
        {
            if ($this->contains($item[0], $name))
                return new ItemEventPass($item);
        }

        foreach (ItemTypeEnum::LEGENDARY as $name)
        {
            if ($this->contains($item[0], $name))
                return new ItemLegendary($item);
        }

        foreach (ItemTypeEnum::CONJURED as $name)
        {
            if ($this->contains($item[0], $name))
                return new ItemConjured($item);
        }

        return new ItemNormal($item);
    }

    function contains($haystack, $needle)
    {
        return strpos($haystack, $needle) !== false;
    }




}