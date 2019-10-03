<?php

namespace App\Model;

use App\Enum\ItemTypeEnum;
use App\Model\Item\Item;
use App\Model\Item\ItemTypes\ItemConjured;
use App\Model\Item\ItemTypes\ItemEventPass;
use App\Model\Item\ItemTypes\ItemLegendary;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\Item\ItemTypes\ItemProAging;

class ItemManager
{
    private $items = [];

    /**
     * @param $day
     */
    public function printOneDay($day)
    {
        echo PHP_EOL;
        echo("-------- Day $day --------\n");
        echo("name, sellIn, quality\n");
        foreach ($this->items as $item) {
            echo $item . PHP_EOL;
        }
        echo PHP_EOL;
    }

    /**
     * Might make them JSON format, or database entries, data is super static here.
     */
    public function initializeItems()
    {
        $temporaryArray =
        [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6)
        ];

        $this->items = $this->assignItemType($temporaryArray);
    }

    /**
     * @param array $items
     */
    public function insertItems(array $items)
    {
        $this->items = $this->assignItemType($items);
    }

    /**
     * A loop which determines each items class,
     * In my opinion, choosing items class should be done while imputing the item into storage,
     * But because we are imputing a whole array, we need to use additional loop
     * @param $array
     * @return array
     */
    public function assignItemType($array)
    {
        $temporaryArray = [];

        foreach ($array as $item) {
            $temporaryArray[] = $this->guessType($item);
        }

        return $temporaryArray;
    }

    /**
     * Need to make constraints to allow return on ITEM TYPE objects
     *
     * @param Item $item
     * @return ItemConjured|ItemEventPass|ItemLegendary|ItemNormal|ItemProAging
     */
    private function guessType(Item $item)
    {
        if ($this->doesHaystackContainArrayValues(ItemTypeEnum::PRO_AGING, $item->name)) {
            return new ItemProAging($item);
        }

        if ($this->doesHaystackContainArrayValues(ItemTypeEnum::EVENT_PASS, $item->name)) {
            return new ItemEventPass($item);
        }

        if ($this->doesHaystackContainArrayValues(ItemTypeEnum::LEGENDARY, $item->name)) {
            return new ItemLegendary($item);
        }

        if ($this->doesHaystackContainArrayValues(ItemTypeEnum::CONJURED, $item->name)) {
            return new ItemConjured($item);
        }

        return new ItemNormal($item);
    }

    /**
     * Checks if array values (strings) are present in heystack string
     *
     * @param $array
     * @param $haystack
     * @return bool
     */
    public function doesHaystackContainArrayValues($array, $haystack): bool
    {
        foreach ($array as $name) {
            if ($this->contains($haystack, $name)) {
                return true;
            }
        }

        return false;
    }

    public function getArray()
    {
        return $this->items;
    }

    /**
     * Checks if heystack string contains needle
     *
     * @param $haystack
     * @param $needle
     * @return bool
     */
    private function contains($haystack, $needle)
    {
        return strpos($haystack, $needle) !== false;
    }

    public function getLength()
    {
        return count($this->items);
    }

    /**
     * @param $index
     * @return mixed|null
     */
    public function getItem($index)
    {
        if ($index >= 0 && $index <= $this->getLength()) {
            $item = $this->items[$index];
            return new Item($item->name, $item->sell_in, $item->quality);
        } else {
            return null;
        }
    }

}
