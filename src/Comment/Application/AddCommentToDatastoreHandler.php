<?php

namespace App\Comment\Application;

use App\Comment\Domain\Entity\Comment;
use App\Comment\Domain\Repository\CommentRepositoryInterface;
use App\Comment\Domain\ValueObject\CommentUpsertedEvent;
use JMS\Serializer\SerializerInterface;

class AddCommentToDatastoreHandler
{
    private $serializer;
    private $repository;

    public function __construct(SerializerInterface $serializer, CommentRepositoryInterface $repository)
    {
        $this->serializer = $serializer;
        $this->repository = $repository;
    }

    public function handle(CommentUpsertedEvent $event): void
    {
        $comment = $event->getData();

        $commentEntity = new Comment(
            $comment->getUserId(),
            $comment->getTopicId(),
            $comment->getComment()
        );

        $this->repository->save($commentEntity);
    }

}