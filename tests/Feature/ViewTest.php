<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('halo')
            ->assertSeeText('Halo Rizki');

        $this->get('halo-lagi')
            ->assertSeeText('Halo Rizki Adi');
    }

    public function test_nested()
    {
        $this->get('hello-world')
            ->assertSeeText('World Hello');
    }

    public function test_template()
    {
        $this->view('hello', ['name' => 'Rizki'])
            ->assertSeeText('Halo Rizki');

        $this->view('hello.world', ['name' => 'Rizki'])
            ->assertSeeText('World Rizki');
    }
}
