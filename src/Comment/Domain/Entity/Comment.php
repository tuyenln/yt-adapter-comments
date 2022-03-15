<?php

namespace App\Comment\Domain\Entity;

class Comment
{
    private $id;
    private $userId;
    private $topicId;
    private $comment;

    public function __construct(string $userId, string $topicId, string $comment)
    {
        $this->userId = $userId;
        $this->topicId = $topicId;
        $this->comment = $comment;
    }
}