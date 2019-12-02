<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserApiController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function indexAction(): Response
    {
        return new Response();
    }
}
