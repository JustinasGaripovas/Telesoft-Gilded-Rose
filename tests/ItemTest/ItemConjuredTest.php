<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\Item;
use App\Model\Item\ItemTypes\ItemConjured;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemConjuredTest extends TestCase
{
    private $itemManager;
    private $gildedRose;

    public function setUp()
    {
        $this->itemManager = new ItemManager();

        $this->itemManager->insertItems(
            [
                new Item("Conjured fresh", 100, -11),
                new Item("Conjured close to sell date", 1, 10),
                new Item("Conjured on sell date", 0, 0),
                new Item("Conjured late after sell date", -10, 10),
                new Item("Conjured crazy", -100, 64)
            ]
        );

        $this->gildedRose = new GildedRose(
            $this->itemManager
        );

        parent::setUp();
    }

    public function testNormalItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(2);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Conjured fresh', 98, 0));
        $this->assertEquals($this->itemManager->getItem(1), new Item('Conjured close to sell date', -1, 6));
        $this->assertEquals($this->itemManager->getItem(2), new Item('Conjured on sell date', -2, 0));
        $this->assertEquals($this->itemManager->getItem(3), new Item('Conjured late after sell date', -12, 2));
        $this->assertEquals($this->itemManager->getItem(4), new Item('Conjured crazy', -102, 42));
    }


    public function testOneConjuredItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(10);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Conjured fresh', 90, 0));
    }
}
