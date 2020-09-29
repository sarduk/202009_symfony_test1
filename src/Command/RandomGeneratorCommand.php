<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Service\RandomGenerator;

class RandomGeneratorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:random-number';

    private $randomGenerator;

    public function __construct(RandomGenerator $randomGenerator)
    {
        $this->randomGenerator = $randomGenerator;

        parent::__construct();
    }


    protected function configure()
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('generate a random number.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command generate a random number')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$myrndnr = 10;
        $this->randomGenerator->getRandomInt(100);
        $output->writeln([
            'numero estratto : '.$myrndnr
        ]); 
        return 0;
    }
}