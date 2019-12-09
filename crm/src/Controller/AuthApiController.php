<?php
declare(strict_types=1);


namespace App\Controller;


use App\Crm\Users\Interfaces\AuthInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auth/")
 */
class AuthApiController
{
    /** @var AuthInterface */
    private $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function authAction(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $token = $this->auth->auth($email, $password);
        } catch (\Throwable $exception) {
            return new Response('Internal error', 500);
        }

        return new JsonResponse(['token' => $token]);
    }
}