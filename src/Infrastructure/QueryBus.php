<?php

declare(strict_types=1);

namespace RaspinuOffice\Infrastructure;

use RaspinuOffice\Infrastructure\Messenger\Query\Query;
use RaspinuOffice\Infrastructure\Messenger\QueryBusInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Throwable;

final class QueryBus implements QueryBusInterface
{

    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }


    public function dispatch(Query $query)
    {
        try {
            $response = $this->messageBus->dispatch($query);

            /** @var HandledStamp $handled */
            $handled = $response->last(HandledStamp::class);

            return $handled->getResult();

        } catch (HandlerFailedException $e) {
            while ($e instanceof HandlerFailedException) {
                /** @var Throwable $e */
                $e = $e->getPrevious();
            }

            throw $e;
        }
    }
}