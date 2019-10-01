<?php


namespace App\Command;


use App\Controller\GildedRose;
use App\Model\Item;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class ApplicationCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('start')
            ->setDescription('Starts the GildedRose problem');
    }
    /**
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $items = array(
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6)
        );

        $output->writeln('<comment>Starting gilded rose process</comment>');

        $start = hrtime(true);

        $process = new GildedRose($items);
        $process->updateQuality();


        $end = hrtime(true);

        $output->writeln($this->timerEnd($start));




        return 0;

    }

    private function timerEnd($startTime): float
    {
        return ((hrtime(true) - $startTime)/1e+6);
    }

}