<?php
declare(strict_types=1);

namespace App\Controller;

use App\Infrastructure\Rpc\RpcMethodList;
use App\Infrastructure\Rpc\RpcRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/user/")
 */
class UserApiController
{
    /** @var RpcMethodList */
    private $rpcMethodList;

    public function __construct(RpcMethodList $rpcMethodList) {
        $this->rpcMethodList = $rpcMethodList;
    }

    /**
     * @Route("", name="user_json_rpc_endpoint", methods={"POST"})
     * @return JsonResponse
     */
    public function endpoint(Request $request): JsonResponse {
        $body = $request->getContent();

        $body = \json_decode($body, true);

        $request = new RpcRequest($body);

        $method = $this->rpcMethodList->findMethod($request->getMethodName());

        $response = $method->call($request);

        return new JsonResponse($response, $response->getCode());
    }
}
