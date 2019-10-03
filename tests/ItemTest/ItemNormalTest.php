<?php

namespace Test\ItemTest;

use App\Controller\GildedRose;
use App\Model\Item\Item;
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
                new Item("Normal item", 10, 10),
                new Item("Even more normal item", 0, 10),
                new Item("Even even more more normal item", 10, 0),
                new Item("Even even even more more more normal item", 0, -10),
                new Item("Even even even even more more more more normal item", -10, -10)
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

        $this->assertEquals($this->itemManager->getItem(0), new Item('Normal item', 7, 7));
        $this->assertEquals($this->itemManager->getItem(1), new Item('Even more normal item', -3, 5));
        $this->assertEquals($this->itemManager->getItem(2), new Item('Even even more more normal item', 7, 0));
        $this->assertEquals($this->itemManager->getItem(3), new Item('Even even even more more more normal item', -3, 0));
        $this->assertEquals($this->itemManager->getItem(4), new Item('Even even even even more more more more normal item', -13, 0));
    }

    public function testOneNormalItemBehaviour()
    {
        $this->gildedRose->loopUpdateQuality(10);

        $this->assertEquals($this->itemManager->getItem(0), new Item('Normal item', 0, 0));
    }
}
