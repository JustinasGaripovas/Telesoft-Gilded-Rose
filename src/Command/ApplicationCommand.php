<?php


namespace App\Command;


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
        $stopwatch = new Stopwatch();
        $stopwatch->start('app-gilded-rose');


        $output->writeln('<comment>Starting </comment>');



        $event = $stopwatch->stop('app-gilded-rose');
        $output->writeln($event->getDuration());

        return 0;

    }

}