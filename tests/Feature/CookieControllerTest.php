<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('User-Id', 'kiadi')
            ->assertCookie('Is-Member', 'true');
    }

    public function test_get_cookie()
    {
        $this->withCookie('User-Id', 'Rizki Adi')
            ->withCookie('Is-Member', 'true')
            ->get('/cookie/get')
            ->assertJson([
                'userId' => 'Rizki Adi',
                'isMember' => 'true'
            ]);
    }
}
