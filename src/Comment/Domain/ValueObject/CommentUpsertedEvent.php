<?php

namespace App\Comment\Domain\ValueObject;

class CommentUpsertedEvent
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData(): Comment
    {
        return $this->data;
    }
}