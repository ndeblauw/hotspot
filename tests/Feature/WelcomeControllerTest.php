<?php

test('Test welcome page content', function () {
    // Arrange

    // Act
    $response = $this->get('/');

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Hello from the welcome page');
    $response->assertSee('Home'); // for a very good reason
});
