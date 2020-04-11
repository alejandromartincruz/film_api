<?php

namespace Bundle\FilmBundle\Application\Command;

use Bundle\ActorBundle\Infrastructure\Repository\ActorRepository;
use Bundle\FilmBundle\Application\Usecase\CreateFilm;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-film';

    private $createFilmCase;

    public function __construct(CreateFilm $createFilmCase)
    {
        $this->createFilmCase = $createFilmCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Crea un nuevo Film')
            ->setHelp('Este comando permite crear un nuevo Film...')
            ->addArgument('name', InputArgument::REQUIRED, 'hay que proporcionar un name para crear el Film.')
            ->addArgument('description', InputArgument::REQUIRED, 'hay que proporcionar un description para crear el Film.')
            ->addArgument('actorId', InputArgument::REQUIRED, 'hay que proporcionar un id de un Actor para crear el Film.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '',
            'Creando un Film',
            '================',
            '',
        ]);

        $name = $input->getArgument('name');
        $description = $input->getArgument('description');
        $actorId = $input->getArgument('actorId');

        $output->writeln($this->createFilmCase->execute($name, $description, $actorId));

        $output->writeln('Whoa!');

        return 0;
    }
}

