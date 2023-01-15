<?php

declare(strict_types=1);

namespace App\Domain\Message;

use JsonSerializable;

class Message implements JsonSerializable
{
    private ?int $id;

    private int $user_id;

    private string $content;

    private string $created_at;

    public function __construct(?int $id, int $user_id, string $content, string $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'content' => $this->content,
            'created_at' => $this->created_at
        ];
    }
}
