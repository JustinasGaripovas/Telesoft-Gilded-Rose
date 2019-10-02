<?php

namespace Test;

use App\Command\ApplicationCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ApplicationCommandTest extends TestCase
{
    /** @var CommandTester */
    private $commandTester;

    protected function setUp()
    {
        $application = new Application();
        $application->add(new ApplicationCommand());
        $command = $application->find('start');
        $this->commandTester = new CommandTester($command);
    }

    public function testExecute()
    {
        $this->commandTester->execute([]);
        $output = $this->commandTester->getDisplay();
        $this->assertContains('End of process', $output);
    }
}
