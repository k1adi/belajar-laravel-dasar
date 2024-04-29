<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
       $this->get('/kiadi')
            ->assertStatus(200)
            ->assertSeeText('Rizki Adi Prisma');
    }

    public function test_redirect()
    {
       $this->get('/rizki')
            ->assertRedirect('/kiadi');
    }

    public function test_fallback()
    {
        $this->get('/asd')
            ->assertSeeText('error 404, page not found');
    }
}
