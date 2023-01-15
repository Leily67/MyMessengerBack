<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class DeleteMessageAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $messageId = (int) $this->resolveArg('id');
        $this->messageRepository->deleteMessageOfId($messageId);

        $this->logger->info("Message of id `${messageId}` was deleted.");

        return $this->respondWithData();
    }
}
