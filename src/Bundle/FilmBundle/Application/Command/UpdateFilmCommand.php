<?php

namespace Bundle\FilmBundle\Application\Command;

use Bundle\FilmBundle\Application\Usecase\UpdateFilm;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-film';

    private $updateFilmCase;

    public function __construct(UpdateFilm $updateFilmCase)
    {
        $this->updateFilmCase = $updateFilmCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Crea un nuevo actor')
            ->setHelp('Este comando permite crear un nuevo actor...')
            ->addArgument('id', InputArgument::REQUIRED, 'hay que proporcionar un id del Film a editar.')
            ->addArgument('name', InputArgument::REQUIRED, 'hay que proporcionar un name para editar el Film.')
            ->addArgument('description', InputArgument::REQUIRED, 'hay que proporcionar un description para editar el Film.')
            ->addArgument('actorId', InputArgument::REQUIRED, 'hay que proporcionar un id de un Actor para editar el Film.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '',
            'Actualizando un Film',
            '================',
            '',
        ]);

        $id = $input->getArgument('id');
        $name = $input->getArgument('name');
        $description = $input->getArgument('description');
        $actorId = $input->getArgument('actorId');

        $output->writeln($this->updateFilmCase->execute($id, $name, $description, $actorId));

        $output->writeln('Whoa!');

        return 0;
    }
}

