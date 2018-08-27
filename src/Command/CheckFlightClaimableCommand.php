<?php

namespace App\Command;

use App\DecisionTable\DecisionTable;
use App\DecisionTable\Table\FlightIsClaimableTable;
use App\Dto\FlightDto;
use SplFileObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CheckClaimable
 */
class CheckFlightClaimableCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'checker:flight-claimable';

    /**
     * CheckFlightClaimableCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Check flights claimable.')
            ->addArgument('file', InputArgument::REQUIRED, '.csv file');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $file = new SplFileObject($input->getArgument('file'));
            $file->setFlags(SplFileObject::READ_CSV);
        } catch (\Exception $e) {
            $output->writeln('File is not valid');

            return;
        }

        foreach ($file as $fileLine) {
            if (empty($fileLine[0]) || empty($fileLine[1]) || !isset($fileLine[2])) {
                $output->writeln('Not valid record ' . implode(', ', $fileLine));
                continue;
            }

            $flightDto = (new FlightDto())
                ->setCountry($fileLine[0])
                ->setStatus($fileLine[1])
                ->setStatusValue((int) $fileLine[2]);

            $decTable = new DecisionTable(new FlightIsClaimableTable(), $flightDto);
            $isValid = $decTable->validate();
            $output->writeln(implode(' ', array_merge($fileLine)).' '.$isValid);
        }
    }
}
