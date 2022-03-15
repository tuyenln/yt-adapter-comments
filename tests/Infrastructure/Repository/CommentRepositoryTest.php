<?php

namespace App\Tests\Infrastructure\Repository;

use App\Comment\Domain\Entity\Comment;
use App\Comment\Infrastructure\Repository\CommentRepository;
use App\Tests\PrivatePropertyManipulator;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class CommentRepositoryTest extends WebTestCase
{
    use PrivatePropertyManipulator;
    use FixturesTrait;

    /** @test */
    public function itSavesACommentToTheDatabase()
    {
        $this->loadFixtures([]);

        $comment = $this->getComment();

        /** @var CommentRepository $repository */
        $repository = self::bootKernel()->getContainer()->get('Test.App\Infrastructure\Repository\CommentRepository');
        $this->assertEquals(0, count($repository->findAll()));

        $repository->save($comment);

        $this->assertEquals(1,count($repository->findAll()));

        $commentFromRepository = $repository->findOneBy(["comment" => "hey iScreaMan23!"]);

        $this->assertEquals('hey iScreaMan23!', $this->getByReflection($commentFromRepository,'comment'));
        $this->assertEquals('sdfsdfsdf-dsfsdfsfs', $this->getByReflection($commentFromRepository,'topicId'));
        $this->assertEquals('sdfsdf-sdfsdf', $this->getByReflection($commentFromRepository,'userId'));
    }

    private function getComment()
    {
        $comment = new Comment('sdfsdf-sdfsdf', 'sdfsdfsdf-dsfsdfsfs', 'hey iScreaMan23!');

        $this->setByReflection($comment,'comment','hey iScreaMan23!');
        $this->setByReflection($comment,'userId','sdfsdf-sdfsdf');
        $this->setByReflection($comment,'topicId','sdfsdfsdf-dsfsdfsfs');

        return $comment;
    }

}