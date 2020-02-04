<?php

namespace Zebra\CadastroProgramadores\Controller;

use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Helper\FlashMessageTrait;

class DeleteProgrammer implements RequestHandlerInterface
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

        $response = new Response(302, ['Location' => '/list-programmers']);

        if (is_null($id) || $id === false) {
            $this->defineMessage('danger', 'Programmer not found');
            return $response;
        }

        $programmer = $this->entityManager->getReference(
            Programmer::class,
            $id
        );

        $this->entityManager->remove($programmer);
        $this->entityManager->flush();
        $this->defineMessage('success', 'Programmer has been deleted!');

        return $response;
    }
}