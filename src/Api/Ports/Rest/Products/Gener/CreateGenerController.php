<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener;


use RaspinuOffice\Api\Ports\Rest\ApiController;
use RaspinuOffice\Api\Ports\Rest\Products\Gener\Request\CreateGenerRequest;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Shared\Domain\Messenger\CommandBusInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

final class CreateGenerController
{
    private ApiController $apiController;
    private CommandBusInterface $commandBus;

    public function __construct(ApiController $apiController, CommandBusInterface $commandBus)
    {
        $this->apiController = $apiController;
        $this->commandBus = $commandBus;
    }


    /**
     * Create a Gener
     *
     * @Route("/create/gener", methods={"POST"}, name="api_gener_create")
     * @OA\Tag(
     *     name="Gener",
     *     description="Operations about gener"
     * )
     *     @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="gener",
     *                type="array",
     *                example={{
     *                  "id": "b026b3f4-be48-11eb-8529-0242ac130003",
     *                  "name": "Rock"
     *                }},
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="id",
     *                         type="string",
     *                         example=""
     *                      ),
     *                      @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example=""
     *                      ),
     *                ),
     *             ),
     *        ),
     * )
     * @OA\Response(
     *        response="200",
     *        description="Success: Gener created",
     *     ),
     * @OA\Response(
     *        response="204",
     *        description="Success: This gener name already exists.",
     *     ),
     **/
    public function __invoke(Request $request): Response
    {

        $request = CreateGenerRequest::fromContent($this->apiController->getContent($request));

        $createGenerCommand = new CreateGenerCommand(
            $request->id(),
            $request->name()
        );

        $this->commandBus->dispatch($createGenerCommand);

        return $this->apiController->makeResponse($createGenerCommand->_toArray(), Response::HTTP_CREATED);
    }
}