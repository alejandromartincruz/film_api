<?php

namespace Bundle\ActorBundle\Application\Command;

use Bundle\ActorBundle\Application\Usecase\CreateActor;
use Bundle\ActorBundle\Infrastructure\Repository\ActorRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateActorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-actor';

    private $createActorCase;

    public function __construct(CreateActor $createActorCase)
    {
        $this->createActorCase = $createActorCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Crea un nuevo actor')
            ->setHelp('Este comando permite crear un nuevo actor...')
            ->addArgument('name', InputArgument::REQUIRED, 'hay que proporcionar un name para el actor.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '',
            'Creando un Actor',
            '================',
            '',
        ]);

        $name = $input->getArgument('name');

        $output->writeln($this->createActorCase->execute($name));

        $output->writeln('Whoa!');

        return 0;
    }
}

