<?php

namespace App\Comment\Infrastructure\Repository;

use App\Comment\Domain\Entity\Comment;
use App\Comment\Domain\Repository\CommentRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    public function save(Comment $comment)
    {
        $this->_em->persist($comment);
        $this->_em->flush($comment);
    }

}