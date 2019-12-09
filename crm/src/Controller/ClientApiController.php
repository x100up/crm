<?php
declare(strict_types=1);

namespace App\Controller;

use App\Crm\Client\Interfaces\ClientCreatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client/")
 */
class ClientApiController
{
    /** @var ClientCreatorInterface */
    private $clientCreator;

    public function __construct(ClientCreatorInterface $clientCreator) {
        $this->clientCreator = $clientCreator;
    }

    /**
     * @Route("create/", name="index")
     *
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request): Response
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $this->clientCreator->createClient($name, $email, $password);
        } catch (\Throwable $exception) {
            return new Response('Internal error', 500);
        }

        return new Response('');
    }
}
