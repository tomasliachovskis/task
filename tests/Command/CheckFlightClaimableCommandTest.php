<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;

/**
 * Class CheckClaimable
 */
class CheckFlightClaimableCommandTest extends WebTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $kernel->boot();

        $application = new Application($kernel);

        $command = $application->find('checker:flight-claimable');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            [
                'command' => $command->getName(),
                'file' => 'var/data/skycop-test.csv',
            ]
        );

        $output = $commandTester->getDisplay();

        $this->assertContains('LV Cancel 20 N', $output);
    }
}
