<?php


namespace App\Command;

use App\Controller\GildedRose;
use App\Enum\ItemValueEnum;
use App\Model\ItemManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApplicationCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('start')
            ->setDescription('Starts the GildedRose solver!');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Starting gilded rose process</comment>');

        $start = hrtime(true);

        $itemStorage = new ItemManager();

        $process = new GildedRose($itemStorage->loadItems());

        for ($i=0;$i<ItemValueEnum::DAYS;$i++) {
            $itemStorage->printOneDay($i);
            $process->updateQuality();
        }

        $output->writeln("<comment>End of process in {$this->timerEnd($start)} milliseconds</comment>");

        return 0;
    }

    /**
     * Calculates time passed from input $startTime, and converts value to milliseconds
     *
     * @param $startTime
     * @return float
     */
    private function timerEnd($startTime): float
    {
        return ((hrtime(true) - $startTime)/1e+6);
    }

}