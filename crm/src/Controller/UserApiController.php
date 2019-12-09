<?php
declare(strict_types=1);

namespace App\Controller;

use App\Crm\Users\Interfaces\UserRegistrarInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/")
 */
class UserApiController
{
    /** @var UserRegistrarInterface */
    private $userRegistrar;

    public function __construct(UserRegistrarInterface $userRegistrar) {
        $this->userRegistrar = $userRegistrar;
    }

    /**
     * @Route("/", name="index")
     *
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $this->userRegistrar->createUser($email, $password);
        } catch (\Throwable $exception) {
            return new Response('Internal error', 500);
        }

        return new Response('');
    }
}
