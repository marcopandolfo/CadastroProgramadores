<?php

use Zebra\CadastroProgramadores\Controller\DeleteProgrammer;
use Zebra\CadastroProgramadores\Controller\ListProgrammers;
use Zebra\CadastroProgramadores\Controller\PersistProgrammer;
use Zebra\CadastroProgramadores\Controller\ProgrammerInsertionForm;
use Zebra\CadastroProgramadores\Controller\UpdateProgrammerForm;

return [
    '/list-programmers' => ListProgrammers::class,
    '/new-programmer' => ProgrammerInsertionForm::class,
    '/save-programmer' => PersistProgrammer::class,
    '/delete-programmer' => DeleteProgrammer::class,
    '/update-programmer' => UpdateProgrammerForm::class
];