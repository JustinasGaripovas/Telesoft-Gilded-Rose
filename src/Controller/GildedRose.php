<?php

namespace App\Controller;

/**
 * Class GildedRose
 * @package App\Controller
 */
class GildedRose
{
    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    /**
     * Updates each items quality and sell in values once
     * Items may be found in src/Model/Item/ItemTypes/*
     */
    public function updateQuality() {
        foreach ($this->items as $item) {
            $item->process();
        }
    }
}