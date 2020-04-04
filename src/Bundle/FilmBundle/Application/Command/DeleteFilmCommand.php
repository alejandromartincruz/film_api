<?php

namespace Bundle\FilmBundle\Application\Command;

use Bundle\FilmBundle\Application\Usecase\DeleteFilm;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:delete-film';

    private $deleteFilmCase;

    public function __construct(DeleteFilm $deleteFilmCase)
    {
        $this->deleteFilmCase = $deleteFilmCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Borra un Film')
            ->setHelp('Este comando permite borrar un Film...')
            ->addArgument('id', InputArgument::REQUIRED, 'hay que proporcionar un id del Film a borrar.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '',
            'Borrando un Film',
            '================',
            '',
        ]);

        $id = $input->getArgument('id');

        $this->deleteFilmCase->execute($id);

        $output->writeln('Whoa!');

        return 0;
    }
}

