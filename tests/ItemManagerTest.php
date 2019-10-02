<?php

namespace Test;

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
                ['Normal item', 10, 20],
                ['Sulfuras legendary item', 2, 0],
                ['Aged Brie proaged item', 2, 0],
                ['Backstage passes to concert', 5, 7],
                ['Conjured soda drink', 5, 7]
            ]
        );

        $this->assertEquals($itemManager->getLength(), 5);
    }

    public function testItemCorrectness()
    {
        $itemManager = new ItemManager();
        $itemManager->insertItems(
            [
                ['Normal item', 10, 20],
            ]
        );

        $this->assertEquals(get_class($itemManager->getItem(0)), ItemNormal::class);
    }
}