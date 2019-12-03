<?php
declare(strict_types=1);

namespace App\Controller;

use App\Crm\Users\Interfaces\UserRegistrarInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserApiController
{
    /** @var UserRegistrarInterface */
    private $userRegistrar;

    public function __construct(UserRegistrarInterface $userRegistrar) {
        $this->userRegistrar = $userRegistrar;
    }


    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $email = $request->get('email', 'a');
        $password = $request->get('password', 'b');

        $this->userRegistrar->createUser($email, $password);

        return new Response('x');
    }
}
