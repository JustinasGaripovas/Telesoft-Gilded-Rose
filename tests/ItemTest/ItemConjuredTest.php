<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\ItemTypes\ItemConjured;
use App\Model\Item\ItemTypes\ItemLegendary;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\Item\ItemTypes\ItemProAging;
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
                ["Conjured fresh", 100, -11],
                ["Conjured close to sell date", 1, 10],
                ["Conjured on sell date", 0, 0],
                ["Conjured late after sell date", -10, 10],
                ["Conjured crazy", -100, 64]
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

        $this->assertEquals($this->itemManager->getItem(0), new ItemConjured(['Conjured fresh', 98, 0]));
        $this->assertEquals($this->itemManager->getItem(1), new ItemConjured(['Conjured close to sell date', -1, 6]));
        $this->assertEquals($this->itemManager->getItem(2), new ItemConjured(['Conjured on sell date', -2, 0]));
        $this->assertEquals($this->itemManager->getItem(3), new ItemConjured(['Conjured late after sell date', -12, 2]));
        $this->assertEquals($this->itemManager->getItem(4), new ItemConjured(['Conjured crazy', -102, 42]));
    }
}