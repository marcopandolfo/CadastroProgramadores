<?php

namespace Zebra\CadastroProgramadores\Controller;

use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Entity\Role;
use Zebra\CadastroProgramadores\Helper\FlashMessageTrait;

class DeleteRole implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-roles']);

        if (is_null($id) || $id === false) {
            $this->defineMessage('danger', 'Role not found');
            return $response;
        }

        $role = $this->entityManager->getReference(
            Role::class,
            $id
        );

        $this->entityManager->remove($role);
        $this->entityManager->flush();
        $this->defineMessage('success', 'Role has been deleted!');

        return $response;
    }
}