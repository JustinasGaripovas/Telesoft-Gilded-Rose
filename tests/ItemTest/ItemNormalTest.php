<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemNormalTest extends TestCase
{
    private $itemManager;
    private $gildedRose;

    public function setUp()
    {
        $this->itemManager = new ItemManager();

        $this->itemManager->insertItems(
            [
                ["Normal item", 10, 10],
                ["Even more normal item", 0, 10],
                ["Even even more more normal item", 10, 0],
                ["Even even even more more more normal item", 0, -10],
                ["Even even even even more more more more normal item", -10, -10]
            ]
        );

        $this->gildedRose = new GildedRose(
            $this->itemManager
        );

        parent::setUp();
    }

    public function testNormalItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(3);

        $this->assertEquals($this->itemManager->getItem(0), new ItemNormal(['Normal item', 7, 7]));
        $this->assertEquals($this->itemManager->getItem(1), new ItemNormal(['Even more normal item', -3, 5]));
        $this->assertEquals($this->itemManager->getItem(2), new ItemNormal(['Even even more more normal item', 7, 0]));
        $this->assertEquals($this->itemManager->getItem(3), new ItemNormal(['Even even even more more more normal item', -3, 0]));
        $this->assertEquals($this->itemManager->getItem(4), new ItemNormal(['Even even even even more more more more normal item', -13, 0]));
    }

    public function testOneNormalItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(10);

        $this->assertEquals($this->itemManager->getItem(0), new ItemNormal(['Normal item', 0, 0]));
    }
}
