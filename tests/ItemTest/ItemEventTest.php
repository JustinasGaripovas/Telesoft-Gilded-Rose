<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\ItemTypes\ItemEventPass;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemEventTest extends TestCase
{
    private $itemManager;
    private $gildedRose;

    public function setUp()
    {
        $this->itemManager = new ItemManager();

        $this->itemManager->insertItems(
            [
                ["Backstage passes fresh", 100, -11],
                ["Backstage passes close to sell date", 5, 0],
                ["Backstage passes on sell date", 12, 0],
                ["Backstage passes late after sell date", -10, -10],
                ["Backstage passes crazy", -100, 64]
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

        $this->assertEquals($this->itemManager->getItem(0), new ItemEventPass(['Backstage passes fresh', 96, 4]));
        $this->assertEquals($this->itemManager->getItem(1), new ItemEventPass(['Backstage passes close to sell date', 1, 12]));
        $this->assertEquals($this->itemManager->getItem(2), new ItemEventPass(['Backstage passes on sell date', 8, 6]));
        $this->assertEquals($this->itemManager->getItem(3), new ItemEventPass(['Backstage passes late after sell date', -14, 0]));
        $this->assertEquals($this->itemManager->getItem(4), new ItemEventPass(['Backstage passes crazy', -104, 0]));
    }

    public function testOneEventItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(100);

        $this->assertEquals($this->itemManager->getItem(0), new ItemEventPass(['Backstage passes fresh', 0, 50]));
    }
}
