<?php

use App\Models\Keyword;
use App\Models\User;

it('lists keywords on the admin index page', function () {
    $user = User::factory()->create();
    Keyword::factory()->create(['name' => 'Laravel']);

    $response = $this->actingAs($user)->get(route('admin.keywords.index'));

    $response->assertOk();
    $response->assertSee('Laravel');
});

it('creates a keyword', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.keywords.store'), [
        'name' => 'Laravel',
    ]);

    $response->assertRedirect(route('admin.keywords.index'));
    $this->assertDatabaseHas('keywords', ['name' => 'Laravel']);
});

it('validates the name when creating a keyword', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.keywords.store'), [
        'name' => '',
    ]);

    $response->assertSessionHasErrors('name');
    $this->assertDatabaseCount('keywords', 0);
});

it('updates a keyword', function () {
    $user = User::factory()->create();
    $keyword = Keyword::factory()->create(['name' => 'Old Name']);

    $response = $this->actingAs($user)->put(route('admin.keywords.update', $keyword), [
        'name' => 'New Name',
    ]);

    $response->assertRedirect(route('admin.keywords.index'));
    $this->assertDatabaseHas('keywords', ['id' => $keyword->id, 'name' => 'New Name']);
});

it('deletes a keyword', function () {
    $user = User::factory()->create();
    $keyword = Keyword::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.keywords.destroy', $keyword));

    $response->assertRedirect(route('admin.keywords.index'));
    $this->assertDatabaseMissing('keywords', ['id' => $keyword->id]);
});

it('requires authentication to manage keywords', function () {
    $this->get(route('admin.keywords.index'))->assertRedirect(route('login'));
});
