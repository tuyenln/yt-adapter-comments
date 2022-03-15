<?php

namespace App\Comment\Domain\ValueObject;

class Comment
{
    private $userId;
    private $topicId;
    private $comment;

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getTopicId(): string
    {
        return $this->topicId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}