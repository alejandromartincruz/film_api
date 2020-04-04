<?php

namespace Bundle\FilmBundle\Application\Command;

use Bundle\FilmBundle\Application\Usecase\ReadFilm;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:read-film';

    private $readFilmCase;

    public function __construct(ReadFilm $readFilmCase)
    {
        $this->readFilmCase = $readFilmCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Devuelve un listado de Films')
            ->setHelp('Este comando permite obtener un listado con todos los Films ordenados alfabeticamente...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '',
            'Listado de Films',
            '================',
            '',
        ]);

        $films = $this->readFilmCase->execute();
        foreach ($films as $film) {
            $output->writeln('Id: ' . $film->getId());
            $output->writeln('Title: ' . $film->getName());
            $output->writeln('Description: ' . $film->getDescription());
            $output->writeln('Actor: ' . $film->getActor()->getName());
            $output->writeln('-----------------');
        }

        $output->writeln('Whoa!');

        return 0;
    }
}

