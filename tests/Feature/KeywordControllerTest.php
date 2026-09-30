<?php

use App\Models\Article;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists keywords with their article count', function () {
    $keyword = Keyword::factory()->create(['name' => 'Laravel']);
    $unusedKeyword = Keyword::factory()->create(['name' => 'CakePHP']);

    $author = User::factory()->create();
    $article = Article::factory()->create(['author_id' => $author->id]);
    $article->keywords()->attach($keyword);

    $response = $this->get(route('keywords.index'));

    $response->assertOk();
    $response->assertSee('Laravel');
    $response->assertSee('1 article');
    $response->assertSee('CakePHP');
    $response->assertSee('0 articles');
});

it('shows a keyword with its articles', function () {
    $keyword = Keyword::factory()->create(['name' => 'Laravel']);

    $author = User::factory()->create(['name' => 'John Doe']);
    $article = Article::factory()->create([
        'title' => 'Hello World',
        'author_id' => $author->id,
    ]);
    $article->keywords()->attach($keyword);

    $response = $this->get(route('keywords.show', $keyword));

    $response->assertOk();
    $response->assertSee('Laravel');
    $response->assertSee('Hello World');
    $response->assertSee('by John Doe');
    $response->assertSee(route('authors.show', $author), escape: false);
});

it('returns a 404 for an unknown keyword', function () {
    $this->get(route('keywords.show', 999))->assertNotFound();
});
