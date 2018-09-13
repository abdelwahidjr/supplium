<?php

namespace Tests\DesignPatterns\More\Repository\Tests;

use Tests\DesignPatterns\More\Repository\Domain\PostId;
use Tests\DesignPatterns\More\Repository\Domain\PostStatus;
use Tests\DesignPatterns\More\Repository\InMemoryPersistence;
use Tests\DesignPatterns\More\Repository\Domain\Post;
use Tests\DesignPatterns\More\Repository\PostRepository;
use PHPUnit\Framework\TestCase;

class PostRepositoryTest extends TestCase
{
    /**
     * @var PostRepository
     */
    private $repository;

    protected function setUp()
    {
        $this->repository = new PostRepository(new InMemoryPersistence());
    }

    public function testCanGenerateId()
    {
        $this->assertEquals(1, $this->repository->generateId()->toInt());
    }

    /**
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage Post with id 42 does not exist
     */
    public function testThrowsExceptionWhenTryingToFindPostWhichDoesNotExist()
    {
        $this->repository->findById(PostId::fromInt(42));
    }

    public function testCanPersistPostDraft()
    {
        $postId = $this->repository->generateId();
        $post = Post::draft($postId, 'Repository Pattern',
            'Design Patterns PHP');
        $this->repository->save($post);

        $this->repository->findById($postId);

        $this->assertEquals($postId,
            $this->repository->findById($postId)->getId());
        $this->assertEquals(PostStatus::STATE_DRAFT,
            $post->getStatus()->toString());
    }
}
