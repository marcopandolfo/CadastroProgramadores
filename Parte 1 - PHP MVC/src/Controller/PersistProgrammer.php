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

class PersistProgrammer implements RequestHandlerInterface
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

        $age = filter_var(
            $request->getParsedBody()['age'],
            FILTER_VALIDATE_INT
        );

        $city = filter_var(
            $request->getParsedBody()['city'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_VALIDATE_EMAIL
        );

        $roleId = filter_var(
            $request->getParsedBody()['role_id'],
            FILTER_VALIDATE_INT
        );

        $exp = filter_var(
            $request->getParsedBody()['exp'],
            FILTER_VALIDATE_FLOAT
        );

        $roleRepo = $this->entityManager->getRepository(Role::class);

        $programmer = new Programmer();
        $programmer->setName($name);
        $programmer->setAge($age);
        $programmer->setCity($city);
        $programmer->setEmail($email);
        /** @var Role $roleObj */
        $roleObj = $roleRepo->findOneBy(['id' => $roleId]);
        $programmer->setRole($roleObj);
        $programmer->setYearsOfExperience($exp);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $type = 'success';
        if (!is_null($id) && $id !== false) {
            $programmer->setId($id);
            $this->entityManager->merge($programmer);
            $this->defineMessage($type, 'Programmer has been updated');
        } else {
            $this->entityManager->persist($programmer);
            $this->defineMessage($type, 'Programmer saved');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/list-programmers']);
    }
}