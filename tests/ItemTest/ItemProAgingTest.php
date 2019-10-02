<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
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
                ["Aged Brie fresh", 100, -11],
                ["Aged Brie close to sell date", 1, 10],
                ["Aged Brie on sell date", 0, 0],
                ["Aged Brie late after sell date", -10, -10],
                ["Aged Brie crazy", -100, 64]
            ]
        );

        $this->gildedRose = new GildedRose(
            $this->itemManager->getArray()
        );

        parent::setUp();
    }

    public function testNormalItemBehaviour()
    {
        $this->gildedRose->updateQuality();
        $this->gildedRose->updateQuality();
        $this->gildedRose->updateQuality();
        $this->gildedRose->updateQuality();

        $this->assertEquals($this->itemManager->getItem(0), new ItemProAging(['Aged Brie fresh', 96, 4]));
        $this->assertEquals($this->itemManager->getItem(1), new ItemProAging(['Aged Brie close to sell date', -3, 14]));
        $this->assertEquals($this->itemManager->getItem(2), new ItemProAging(['Aged Brie on sell date', -4, 4]));
        $this->assertEquals($this->itemManager->getItem(3), new ItemProAging(['Aged Brie late after sell date', -14, 4]));
        $this->assertEquals($this->itemManager->getItem(4), new ItemProAging(['Aged Brie crazy', -104, 50]));
    }

    public function testOneProAgingItemBehaviour()
    {
        for ($i = 0 ;$i<10;$i++) {
            $this->gildedRose->updateQuality();
        }

        $this->assertEquals($this->itemManager->getItem(0), new ItemProAging(['Aged Brie fresh', 90, 10]));
    }

}