<?php

namespace Tests\Feature;

use App\Comment;
use Tests\TestCase;

class CommentsTest extends TestCase
{

    public function testsCommentsAreCreatedCorrectly()
    {
        $response = $this->json('POST',
            '/api/comments/', [
                'name' => 'Luk',
                'email' => 'dark@will.be',
                'text' => 'this is test'
            ]
        );

        $response
            ->assertStatus(201)
            ->assertJson(['name' => 'Luk', 'email' => 'dark@will.be', 'text' => 'this is test']);
    }

    public function testsCommentsAreUpdatedCorrectly()
    {
        $comment = factory(Comment::class)->create([
            'name' => 'Luk',
            'email' => 'dark@will.be',
            'text' => 'this is test'
        ]);

        $payload = [
            'name' => 'Lorem',
            'email' => 'Ipsum',
            'text' => 'Lorem Ipsum'
        ];

        $response = $this->json('PUT', '/api/comments/' . $comment->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'name' => 'Lorem',
                'email' => 'Ipsum',
                'text' => 'Lorem Ipsum'
            ]);
    }

    public function testsCommentsAreDeletedCorrectly()
    {
        $comment = factory(Comment::class)->create([
            'name' => 'Luk',
            'email' => 'dark@will.be',
            'text' => 'this is test'
        ]);

        $this->json('DELETE', '/api/comments/' . $comment->id, [])
            ->assertStatus(204);
    }

    public function testCommentsAreListedCorrectly()
    {
        factory(Comment::class)->create([
            'name' => 'Luk',
            'email' => 'dark@will.be',
            'text' => 'this is test'
        ]);

        factory(Comment::class)->create([
            'name' => 'Yoda',
            'email' => 'light@always.be',
            'text' => 'this is test'
        ]);

        $response = $this->json('GET', '/api/comments', [])
            ->assertStatus(200)
            ->assertJson([
                [   'name' => 'Luk',
                    'email' => 'dark@will.be',
                    'text' => 'this is test'
                ],
                [   'name' => 'Yoda',
                    'email' => 'light@always.be',
                    'text' => 'this is test'
                ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'email', 'text', 'parent_id', 'created_at', 'updated_at'],
            ]);
    }

}
