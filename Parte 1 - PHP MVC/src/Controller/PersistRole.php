<?php


namespace Zebra\CadastroProgramadores\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Entity\Role;
use Zebra\CadastroProgramadores\Helper\FlashMessageTrait;

class PersistRole implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $name = filter_var(
            $request->getParsedBody()['name'],
            FILTER_SANITIZE_STRING
        );


        $role = new Role();
        $role->setRole($name);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $type = 'success';
        if (!is_null($id) && $id !== false) {
            $role->setId($id);
            $this->entityManager->merge($role);
            $this->defineMessage($type, 'Role has been updated');
        } else {
            $this->entityManager->persist($role);
            $this->defineMessage($type, 'Role has been saved');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/list-roles']);
    }
}