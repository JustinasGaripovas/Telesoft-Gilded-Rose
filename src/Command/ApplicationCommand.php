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
        $output->writeln('<comment>Starting gilded rose process</comment>');

        $start = hrtime(true);

        $process = new GildedRose($items);
        $process->updateQuality();

        $output->writeln($this->timerEnd($start));

        return 0;
    }

    private function timerEnd($startTime): float
    {
        return ((hrtime(true) - $startTime)/1e+6);
    }

}