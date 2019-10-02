<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
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
                ["Sulfuras fresh", 100, -11],
                ["Sulfuras close to sell date", 1, 10],
                ["Sulfuras on sell date", 0, 0],
                ["Sulfuras late after sell date", -10, -10],
                ["Sulfuras crazy", -100, 64]
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

        $this->assertEquals($this->itemManager->getItem(0), new ItemLegendary(['Sulfuras fresh', 0, 80]));
        $this->assertEquals($this->itemManager->getItem(1), new ItemLegendary(['Sulfuras close to sell date', 0, 80]));
        $this->assertEquals($this->itemManager->getItem(2), new ItemLegendary(['Sulfuras on sell date', 0, 80]));
        $this->assertEquals($this->itemManager->getItem(3), new ItemLegendary(['Sulfuras late after sell date', -0, 80]));
        $this->assertEquals($this->itemManager->getItem(4), new ItemLegendary(['Sulfuras crazy', -0, 80]));
    }

    public function testOneLegendaryItemBehaviour()
    {
        for ($i = 0 ;$i<=35;$i++) {
            $this->gildedRose->updateQuality();
        }

        $this->assertEquals($this->itemManager->getItem(0), new ItemLegendary(['Sulfuras fresh', 0, 80]));
    }
}