<?php

namespace Zebra\CadastroProgramadores\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Entity\Role;
use Zebra\CadastroProgramadores\Helper\ViewRenderTrait;

class ListRoles implements RequestHandlerInterface
{
    use ViewRenderTrait;

    private $rolesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->rolesRepository = $entityManager->getRepository(Role::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('role/list-roles.php', [
            'title' => 'Roles',
            'roles' => $this->rolesRepository->findAll(),

        ]);
        return new Response(200, [], $html);
    }
}