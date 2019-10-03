<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\Item;
use App\Model\Item\ItemTypes\ItemLegendary;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\Item\ItemTypes\ItemProAging;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemLegendaryTest extends TestCase
{
    private $itemManager;
    private $gildedRose;

    public function setUp()
    {
        $this->itemManager = new ItemManager();

        $this->itemManager->insertItems(
            [
                new Item("Sulfuras fresh", 100, -11),
                new Item("Sulfuras close to sell date", 1, 10),
                new Item("Sulfuras on sell date", 0, 0),
                new Item("Sulfuras late after sell date", -10, -10),
                new Item("Sulfuras crazy", -100, 64)
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

        $this->assertEquals($this->itemManager->getItem(0), new Item('Sulfuras fresh', 0, 80));
        $this->assertEquals($this->itemManager->getItem(1), new Item('Sulfuras close to sell date', 0, 80));
        $this->assertEquals($this->itemManager->getItem(2), new Item('Sulfuras on sell date', 0, 80));
        $this->assertEquals($this->itemManager->getItem(3), new Item('Sulfuras late after sell date', -0, 80));
        $this->assertEquals($this->itemManager->getItem(4), new Item('Sulfuras crazy', -0, 80));
    }

    public function testOneLegendaryItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(35);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Sulfuras fresh', 0, 80));
    }
}
