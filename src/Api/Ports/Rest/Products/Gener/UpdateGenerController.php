<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener;


use RaspinuOffice\Api\Ports\Rest\ApiController;
use RaspinuOffice\Api\Ports\Rest\Products\Gener\Request\UpdateGenerRequest;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\UpdateGenerCommand;
use RaspinuOffice\Shared\Domain\Messenger\CommandBusInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

final class UpdateGenerController
{
    private ApiController $apiController;
    private CommandBusInterface $commandBus;

    public function __construct(ApiController $apiController, CommandBusInterface $commandBus)
    {
        $this->apiController = $apiController;
        $this->commandBus = $commandBus;
    }

    /**
     * Update a Gener
     *
     * @Route("/update/gener", methods={"PUT"}, name="api_gener_update")
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
     *
     *     @OA\Response(
     *        response="200",
     *        description="Successful response: Gener resource has been updated."
     *     ),
     *     @OA\Response(
     *        response="204",
     *        description="Successful response: The resource already exists. There has been no change."
     *     ),
     * )
     **/
    public function __invoke(Request $request): Response
    {
        $request = UpdateGenerRequest::fromContent($this->apiController->getContent($request));
        $updateGenerCommand = new UpdateGenerCommand(
            $request->id(),
            $request->name()
        );

        $this->commandBus->dispatch($updateGenerCommand);

        return $this->apiController->makeObjectResponse($updateGenerCommand->_toString(), Response::HTTP_CREATED);
    }
}