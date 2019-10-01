<?php


namespace App\Command;


use App\Controller\GildedRose;
use App\Enum\ItemValueEnum;
use App\Model\Item;
use App\Model\ItemManager;
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
        $output->writeln('<comment>Starting gilded rose process</comment>');

        $start = hrtime(true);

        $itemStorage = new ItemManager();

        $process = new GildedRose($itemStorage->loadItems());


        for ($i=0;$i<=ItemValueEnum::DAYS;$i++) {
            $process->updateQuality();
            $itemStorage->printOneDay($i);
        }

        $output->writeln($this->timerEnd($start));

        return 0;
    }

    private function timerEnd($startTime): float
    {
        return ((hrtime(true) - $startTime)/1e+6);
    }

}