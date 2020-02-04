<?php


namespace Zebra\CadastroProgramadores\Controller;



use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Entity\Role;
use Zebra\CadastroProgramadores\Helper\FlashMessageTrait;
use Zebra\CadastroProgramadores\Helper\ViewRenderTrait;

class UpdateRoleForm implements RequestHandlerInterface
{
    use ViewRenderTrait, FlashMessageTrait;

    /**
     * @var ObjectRepository
     */
    private $roleRepo;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->roleRepo = $entityManager
            ->getRepository(Role::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-roles']);
        if (is_null($id) || $id === false) {
            $this->defineMessage('danger', 'Role ID is invalid');
            return $response;
        }

        $role = $this->roleRepo->find($id);

        $html = $this->render('role/form.php', [
            'role' => $role,
            'title' => 'Update role ' . substr($role->getRole(), 0, 10),
        ]);

        return new Response(200, [], $html);
    }
}