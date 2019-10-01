<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('test')
            ->setDescription('Simple demo command.')
            ->addArgument('name', InputArgument::OPTIONAL, 'Random name.');
    }
    /**
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Testing testing</comment>');
    }

}