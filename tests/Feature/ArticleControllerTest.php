<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists articles on the index page, and if author is unknow, show unknown', function () {
    $article = Article::factory()->create([
        'title' => 'Hello World',
    ]);

    $response = $this->get('/articles');

    $response->assertStatus(200);
    $response->assertSee('Hello World');
    $response->assertSee(' by unknown');
});

it('lists articles on the index page with their author name', function () {
    // Arrange
    $user = User::factory()->create([
        'name' => 'John Doe',
    ]);

    $article = Article::factory()->create([
        'title' => 'Hello World',
        'author_id' => 1,
    ]);

    // Act
    $response = $this->get('/articles');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Hello World');
    $response->assertDontSee(' by unknown');
    $response->assertSee(' by John Doe');
});
