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

class UpdateProgrammerForm implements RequestHandlerInterface
{
    use ViewRenderTrait, FlashMessageTrait;

    /**
     * @var ObjectRepository
     */
    private $programmerRepo;

    private $rolesRepo;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->rolesRepo = $entityManager
            ->getRepository(Role::class);
        $this->programmerRepo = $entityManager
            ->getRepository(Programmer::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-programmers']);
        if (is_null($id) || $id === false) {
            $this->defineMessage('danger', 'Programmer ID is invalid');
            return $response;
        }

        $programmer = $this->programmerRepo->find($id);

        $html = $this->render('programmer/form.php', [
            'programmer' => $programmer,
            'title' => 'Update programmer ' . substr($programmer->getName(), 0, 10),
            'roles' => $this->rolesRepo->findAll(),
        ]);

        return new Response(200, [], $html);
    }
}