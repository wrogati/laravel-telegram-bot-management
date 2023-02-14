<?php

namespace Tests\Feature;

use Tests\TestCase;

class FeatureTest extends TestCase
{
    public function authenticated(): self
    {
        $response = $this->postJson(route('auth.login'), [
            'email' => 'joeltiago001745a@gmail.com',
            'password' => '@Senha123'
        ]);

        $token = $response->json('data.auth_secure_token');

        return $this->withHeaders(['auth-secure-token' => $token]);
    }
}
