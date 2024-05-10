<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/url/full?name=Rizki')
            ->assertSeeText('/url/full?name=Rizki');
    }

    public function test_name()
    {
        $this->get('/url/named')->assertSeeText("http://localhost/controller/halo/Rizki");
    }

    public function test_action()
    {
        $this->get('/url/action')->assertSeeText("/form");
    }
}
