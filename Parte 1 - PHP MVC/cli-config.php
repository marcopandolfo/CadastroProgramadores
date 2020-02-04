<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Zebra\CadastroProgramadores\Infra\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);