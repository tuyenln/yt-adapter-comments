<?php

namespace App\Comment\Domain\Repository;

use App\Comment\Domain\Entity\Comment;

interface CommentRepositoryInterface
{
    public function save(Comment $comment);
}