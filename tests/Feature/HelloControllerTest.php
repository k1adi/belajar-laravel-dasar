<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/controller/halo/rizki')
            ->assertSeeText("Halo rizki");
    }

    public function test_request()
    {
        $this->get('/controller/halo/request', [
            'Accept' => 'plain/text',
        ])->assertSeeText('controller/halo/request')
            ->assertSeeText('http://localhost/controller/halo/request')
            ->assertSeeText('GET')
            ->assertSeeText('plain/text');
    }
}
