<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Domain\Messenger;

use RaspinuOffice\Shared\Domain\Messenger\Query\Query;
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


    public function dispatch(Query $query): Query
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