<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    // $this->assertAuthenticated();
    $this->assertGuest();  // l'utilisateur ne doit pas être authentifié directement, il doit vérifier son emmail d'abord
    $response->assertRedirect(route('dashboard', absolute: false));
});
