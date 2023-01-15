<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class EditMessageAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $messageId = (int) $this->resolveArg('id');
        $message = $this->messageRepository->editMessageOfId($messageId, $this->request->getParsedBody());

        $this->logger->info("Message of id `${messageId}` was edited.");

        return $this->respondWithData($message);
    }
}
