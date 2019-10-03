<?php

namespace Test;

use App\Model\Item\Item;
use App\Model\Item\ItemTypes\ItemNormal;
use App\Model\ItemManager;
use PHPUnit\Framework\TestCase;

class ItemManagerTest extends TestCase
{
    public function testItemInsertion()
    {
        $itemManager = new ItemManager();
        $itemManager->insertItems(
            [
                new Item('Normal item', 10, 20),
                new Item('Sulfuras legendary item', 2, 0),
                new Item('Aged Brie proaged item', 2, 0),
                new Item('Backstage passes to concert', 5, 7),
                new Item('Conjured soda drink', 5, 7)
            ]
        );

        $this->assertEquals($itemManager->getLength(), 5);
    }

    public function testItemCorrectness()
    {
        $itemManager = new ItemManager();
        $itemManager->insertItems(
            [
                new Item('Normal item', 10, 20),
            ]
        );

        $this->assertEquals(get_class($itemManager->getItem(0)), Item::class);
    }
}
