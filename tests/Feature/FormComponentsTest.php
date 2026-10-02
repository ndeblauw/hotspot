<?php

beforeEach(function () {
    $this->withViewErrors([]);
});

it('renders a select with options and marks the selected value', function () {
    $view = $this->blade(
        '<x-form-select name="status" label="Status" value="b" :options="$options" />',
        ['options' => ['a' => 'Alpha', 'b' => 'Beta']],
    );

    $view->assertSee('Status');
    $view->assertSee('Alpha');
    $view->assertSee('Beta');
    $view->assertSee('value="b" selected', false);
});

it('falls back to old input for the selected value on a select', function () {
    $this->withSession(['_old_input' => ['status' => 'a']]);
    $this->app['request']->setLaravelSession($this->app['session']->driver());

    $view = $this->blade(
        '<x-form-select name="status" label="Status" value="b" :options="$options" />',
        ['options' => ['a' => 'Alpha', 'b' => 'Beta']],
    );

    $view->assertSee('value="a" selected', false);
});

it('renders radio buttons and marks the checked value', function () {
    $view = $this->blade(
        '<x-form-radio-buttons name="status" label="Status" value="b" :options="$options" />',
        ['options' => ['a' => 'Alpha', 'b' => 'Beta']],
    );

    $view->assertSee('Status');
    $view->assertSee('type="radio"', false);
    $view->assertSee('value="b" checked', false);
});

it('renders a text input with its label, placeholder and value', function () {
    $view = $this->blade(
        '<x-form-text-input name="title" label="Title" placeholder="Enter title" value="Hello" />',
    );

    $view->assertSee('Title');
    $view->assertSee('type="text"', false);
    $view->assertSee('placeholder="Enter title"', false);
    $view->assertSee('value="Hello"', false);
});

it('falls back to old input for a text input', function () {
    $this->withSession(['_old_input' => ['title' => 'Old Title']]);
    $this->app['request']->setLaravelSession($this->app['session']->driver());

    $view = $this->blade(
        '<x-form-text-input name="title" label="Title" value="Hello" />',
    );

    $view->assertSee('value="Old Title"', false);
});

it('renders a number input with its value', function () {
    $view = $this->blade(
        '<x-form-number-input name="author_id" label="Author" value="5" />',
    );

    $view->assertSee('Author');
    $view->assertSee('type="number"', false);
    $view->assertSee('value="5"', false);
});

it('renders a textarea with its value', function () {
    $view = $this->blade(
        '<x-form-textarea name="body" label="Body" value="Some content" />',
    );

    $view->assertSee('Body');
    $view->assertSee('Some content');
});

it('renders checkboxes and marks the checked values', function () {
    $view = $this->blade(
        '<x-form-checkboxes name="keywords" label="Keywords" :values="$values" :options="$options" />',
        ['values' => [1], 'options' => [1 => 'News', 2 => 'Sport']],
    );

    $view->assertSee('Keywords');
    $view->assertSee('name="keywords[]"', false);
    $view->assertSee('value="1" checked', false);
    $view->assertSee('value="2"', false);
});

it('shows a validation error for the field', function () {
    $this->withViewErrors(['status' => ['The status field is required.']]);

    $view = $this->blade(
        '<x-form-select name="status" label="Status" :options="$options" />',
        ['options' => ['a' => 'Alpha']],
    );

    $view->assertSee('The status field is required.');
});
