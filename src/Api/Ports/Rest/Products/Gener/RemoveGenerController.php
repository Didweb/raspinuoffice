<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener;


use RaspinuOffice\Api\Ports\Rest\ApiController;
use RaspinuOffice\Api\Ports\Rest\Products\Gener\Request\RemoveGenerRequest;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\RemoveGenerCommand;
use RaspinuOffice\Shared\Domain\Messenger\CommandBusInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

final class RemoveGenerController
{
    private ApiController $apiController;
    private CommandBusInterface $commandBus;

    public function __construct(ApiController $apiController, CommandBusInterface $commandBus)
    {
        $this->apiController = $apiController;
        $this->commandBus = $commandBus;
    }

    /**
     * Remove a Gener
     *
     * @Route("/remove/gener/{id}", methods={"GET"}, name="api_gener_remove")
     * @OA\Tag(
     *     name="Gener",
     *     description="Operations about gener: Remove"
     * )
     *
     * @OA\Get(
     *     path="/remove/gener/",
     *     tags={"Gener"},
     *     @OA\Parameter(ref="#/api/remove/gener/id")
     * ),
     *
     * @OA\Response(
     *        response="200",
     *        description="Gender was removed",
     *     ),
     * @OA\Response(
     *        response="404",
     *        description="Gender not found",
     *     ),
     **/
    public function __invoke(Request $request): Response
    {

        $request = RemoveGenerRequest::fromContent($request);

        $removeGenerCommand = new RemoveGenerCommand($request->id());

        $this->commandBus->dispatch($removeGenerCommand);


        return $this->apiController->makeResponse($removeGenerCommand->_toArray(), Response::HTTP_OK);
    }
}