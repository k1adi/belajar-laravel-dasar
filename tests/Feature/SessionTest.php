<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/session/create')
            ->assertSeeText("OK")
            ->assertSessionHas('userLoggedIn', "Rizki Adi")
            ->assertSessionHas("isMember", "true");
    }

    public function test_get()
    {
        $this->withSession([
            'userLoggedIn' => 'Rizki Adi',
            'isMember' => true
        ])->get('/session/get')
            ->assertSeeText('Rizki Adi')
            ->assertSeeText('1');
    }
}
