<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/redirect/from')
            ->assertRedirect('/redirect/to');
    }

    public function test_name()
    {
        $this->get('/redirect/name')
            ->assertRedirect('/redirect/name/rizki');
    }

    public function test_action()
    {
        $this->get('/redirect/action')
            ->assertRedirect('/redirect/name/rizki');
    }

    public function test_away()
    {
        $this->get('/redirect/away')
            ->assertRedirect('https://ganyem.netlify.app');
    }
}
