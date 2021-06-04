<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Label;

use RaspinuOffice\Api\Ports\Rest\ApiController;
use RaspinuOffice\Api\Ports\Rest\Products\Label\Request\CreateLabelRequest;
use RaspinuOffice\Backoffice\Products\Label\Application\Command\CreateLabelCommand;
use RaspinuOffice\Shared\Domain\Messenger\CommandBusInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

final class CreatedLabelPostController
{
    private ApiController $apiController;
    private CommandBusInterface $commandBus;

    public function __construct(ApiController $apiController, CommandBusInterface $commandBus)
    {
        $this->apiController = $apiController;
        $this->commandBus = $commandBus;
    }

    /**
     * Create a Label
     *
     * @Route("/create/label", methods={"POST"}, name="api_gener_label")
     * @OA\Tag(
     *     name="Label",
     *     description="Operations about label"
     * )
     *     @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for create label",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="label",
     *                type="array",
     *                example={{
     *                  "id": "b026b3f4-be48-11eb-8529-0242ac130011",
     *                  "name": "EMI Records"
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
     *        description="Success: Label created",
     *     ),
     * @OA\Response(
     *        response="204",
     *        description="Success: This gener label already exists.",
     *     ),
     **/
    public function __invoke(Request $request): Response
    {

        $request = CreateLabelRequest::fromContent($this->apiController->getContent($request));

        $createLabelCommand = new CreateLabelCommand(
            $request->id(),
            $request->name()
        );

        $this->commandBus->dispatch($createLabelCommand);

        return $this->apiController->makeResponse($createLabelCommand->_toArray(), Response::HTTP_CREATED);
    }

}