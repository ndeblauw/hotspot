<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists authors with their article count', function () {
    $author = User::factory()->create(['name' => 'John Doe']);
    $stranger = User::factory()->create(['name' => 'Jane Roe']);

    Article::factory()->create(['author_id' => $author->id]);
    Article::factory()->create(['author_id' => $author->id]);

    $response = $this->get(route('authors.index'));

    $response->assertStatus(200);
    $response->assertSee('John Doe');
    $response->assertSee('2 articles');
    $response->assertDontSee('Jane Roe');
});

it('shows an author with their articles', function () {
    $author = User::factory()->create(['name' => 'John Doe']);

    $article = Article::factory()->create([
        'title' => 'Hello World',
        'author_id' => $author->id,
    ]);

    $response = $this->get(route('authors.show', $author));

    $response->assertOk();
    $response->assertSee('John Doe');
    $response->assertSee('Hello World');
    $response->assertSee(route('articles.show', $article), escape: false);
});

it('returns a 404 for an unknown author', function () {
    $this->get(route('authors.show', 999))->assertNotFound();
});
