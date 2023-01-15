<?php

declare(strict_types=1);

namespace App\Domain\Message;

interface MessageRepository
{
    /**
     * @return Message[]
     */
    public function findAll();

    /**
     * @param int $id
     * @return Message
     * @throws MessageNotFoundException
     */
    public function findMessageOfId(int $id);

    public function createMessage($message);

    public function editMessageOfId(int $id, $message);

    public function deleteMessageOfId(int $id);

    public function findConversation($user_id, $to_user);
}