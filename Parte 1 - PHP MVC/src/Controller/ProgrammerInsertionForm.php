<?php


namespace Zebra\CadastroProgramadores\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Role;
use Zebra\CadastroProgramadores\Helper\ViewRenderTrait;

class ProgrammerInsertionForm implements RequestHandlerInterface
{
    use ViewRenderTrait;

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
        $html = $this->render('programmer/form.php', [
            'title' => 'New Programmer',
            'roles' => $this->entityManager->getRepository(Role::class)->findAll()
        ]);

        return new Response(200, [], $html);
    }
}