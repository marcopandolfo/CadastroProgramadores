<?php

use Zebra\CadastroProgramadores\Controller\DeleteProgrammer;
use Zebra\CadastroProgramadores\Controller\ListProgrammers;

return [
    '/list-programmers' => ListProgrammers::class,
    '/delete-programmer' => DeleteProgrammer::class
];