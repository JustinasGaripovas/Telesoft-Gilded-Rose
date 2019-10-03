<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\Item;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\Item\ItemTypes\ItemProAging;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemProAgingTest extends TestCase
{
    private $itemManager;
    private $gildedRose;

    public function setUp()
    {
        $this->itemManager = new ItemManager();

        $this->itemManager->insertItems(
            [
                new Item("Aged Brie fresh", 100, -11),
                new Item("Aged Brie close to sell date", 1, 10),
                new Item("Aged Brie on sell date", 0, 0),
                new Item("Aged Brie late after sell date", -10, -10),
                new Item("Aged Brie crazy", -100, 64)
            ]
        );

        $this->gildedRose = new GildedRose(
            $this->itemManager
        );

        parent::setUp();
    }

    public function testNormalItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(4);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Aged Brie fresh', 96, 4));
        $this->assertEquals($this->itemManager->getItem(1), new Item('Aged Brie close to sell date', -3, 14));
        $this->assertEquals($this->itemManager->getItem(2), new Item('Aged Brie on sell date', -4, 4));
        $this->assertEquals($this->itemManager->getItem(3), new Item('Aged Brie late after sell date', -14, 4));
        $this->assertEquals($this->itemManager->getItem(4), new Item('Aged Brie crazy', -104, 50));
    }

    public function testOneProAgingItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(10);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Aged Brie fresh', 90, 10));
    }
}
