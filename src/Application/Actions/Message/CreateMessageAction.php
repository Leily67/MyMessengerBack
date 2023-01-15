<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class CreateMessageAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userid = $this->request->getAttribute('decoded_token_data')["id"];
        $body = $this->request->getParsedBody();
        $body["user_id"] = $userid;
        $body["created_at"] = date("Y/m/d H:i:s");
        
        return $this->respondWithData($this->messageRepository->createMessage($body));
    }
}
