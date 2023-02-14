<?php

namespace Tests\Feature\Auth;

use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;

class LogoutTest extends FeatureTest
{
    public function testSuccess()
    {
        $response = $this->authenticated()->getJson(route('auth.logout'));

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testFailInvalidSession()
    {
        $response = $this->withHeaders(['auth-secure-token' => '64430434-6712-4711-8b5e-d87f77bfcaf0'])
            ->getJson(route('auth.logout'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
