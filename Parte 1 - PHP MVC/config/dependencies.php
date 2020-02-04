<?php

use Doctrine\ORM\EntityManagerInterface;
use Zebra\CadastroProgramadores\Infra\EntityManagerFactory;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerFactory())->getEntityManager();
    }
]);
return $builder->build();
