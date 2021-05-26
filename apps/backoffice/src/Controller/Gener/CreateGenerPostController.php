<?php

declare(strict_types=1);

namespace RaspinuOffice\Apps\Backoffice\Controller\Gener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateGenerPostController
{
    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            [
                'backoffice-create-gener' => 'ok',
            ]
        );
    }
}