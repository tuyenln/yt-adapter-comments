<?php

namespace App\Tests\Application;

use App\Comment\Application\AddCommentToDatastoreHandler;
use App\Comment\Domain\ValueObject\CommentUpsertedEvent;
use JMS\Serializer\SerializerInterface;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class AddCommentToDatastoreHandlerTest extends WebTestCase
{
    use FixturesTrait;

    /** @test */
    public function itHandlesAComment()
    {
//        $this->loadFixtures([]);

        $request = file_get_contents( __DIR__ . '/AddCommentToDatastoreHandlerTest/request.json');

        /** @var SerializerInterface $serializer */
        $serializer = self::bootKernel()->getContainer()->get('jms_serializer');

        $event = $serializer->deserialize($request, CommentUpsertedEvent::class, 'json');

        $repository = $this->getContainer()->get('Test.App\Infrastructure\Repository\CommentRepository');

        $handler = new AddCommentToDatastoreHandler($serializer,$repository);
        $handler->handle($event);

        $repository = $this->getContainer()->get('Test.App\Infrastructure\Repository\CommentRepository');

        $this->assertEquals(1,count($repository->findAll()));
    }

}