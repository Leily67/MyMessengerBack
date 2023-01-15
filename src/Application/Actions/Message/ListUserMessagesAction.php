<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class ListUserMessagesAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user_id = $this->request->getAttribute('decoded_token_data')["id"];
        $to_user = (int) $this->resolveArg('id');
        $messages = $this->messageRepository->findConversation($user_id, $to_user);

        $this->logger->info("Messages list from ${user_id} to ${to_user} was viewed");

        return $this->respondWithData($messages);
    }
}
