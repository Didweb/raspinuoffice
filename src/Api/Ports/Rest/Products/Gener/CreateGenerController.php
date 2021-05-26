<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener;


use RaspinuOffice\Api\Ports\Rest\ApiController;
use RaspinuOffice\Api\Ports\Rest\Products\Gener\Request\CreateGenerRequest;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Infrastructure\Messenger\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateGenerController extends AbstractController
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