<?php

use Zebra\CadastroProgramadores\Controller\DeleteProgrammer;
use Zebra\CadastroProgramadores\Controller\DeleteRole;
use Zebra\CadastroProgramadores\Controller\ListProgrammers;
use Zebra\CadastroProgramadores\Controller\ListRoles;
use Zebra\CadastroProgramadores\Controller\PersistProgrammer;
use Zebra\CadastroProgramadores\Controller\PersistRole;
use Zebra\CadastroProgramadores\Controller\ProgrammerInsertionForm;
use Zebra\CadastroProgramadores\Controller\RoleInsertionForm;
use Zebra\CadastroProgramadores\Controller\UpdateProgrammerForm;
use Zebra\CadastroProgramadores\Controller\UpdateRoleForm;

return [
    /* Programmer */
    '/list-programmers' => ListProgrammers::class,
    '/new-programmer' => ProgrammerInsertionForm::class,
    '/save-programmer' => PersistProgrammer::class,
    '/delete-programmer' => DeleteProgrammer::class,
    '/update-programmer' => UpdateProgrammerForm::class,
    /* Roles */
    '/list-roles' => ListRoles::class,
    '/new-role' => RoleInsertionForm::class,
    '/save-role' => PersistRole::class,
    '/delete-role' => DeleteRole::class,
    '/update-role' => UpdateRoleForm::class,
];