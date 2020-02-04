<?php


namespace Zebra\CadastroProgramadores\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zebra\CadastroProgramadores\Entity\Programmer;
use Zebra\CadastroProgramadores\Helper\ViewRenderTrait;

class ListProgrammers implements RequestHandlerInterface
{
    use ViewRenderTrait;

    private $programmersRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->programmersRepository = $entityManager->getRepository(Programmer::class);
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('programmer/list-programmers.php', [
            'title' => 'Programmers',
            'programmers' => $this->programmersRepository->findAll(),

        ]);
        return new Response(200, [], $html);
    }
}