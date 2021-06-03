<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest;


use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiController
{




    public function getContent(Request $request ): array
    {

        $content = $request->getContent();

        if (!is_string($content)) {
            throw new Exception('Content must be of type string');
        }

        return json_decode($content, true);
    }

    public function makeError(string $message, int $httpErrorCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return $this->makeResponse(['message' => $message], $httpErrorCode);
    }

    public function makeResponse(array $data = [], int $httpCode = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse(
            json_encode($data),
            $httpCode,
            [],
            true
        );
    }

    /**
     * @psalm-suppress MissingParamType
     * @phpstan-ignore-next-line
     */
    public function makeObjectResponse($response, int $httpCode = Response::HTTP_OK, array $serializationGroups = []): JsonResponse
    {
        return new JsonResponse(
            $response,
            $httpCode,
            [],
            true
        );
    }
}