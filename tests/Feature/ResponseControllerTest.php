<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/response/halo')
            ->assertStatus(200)
            ->assertSeeText('Halo Rizki!');
    }

    public function test_header()
    {
        $this->get('/response/header')
            ->assertStatus(201)
            ->assertSeeText('Rizki')->assertSeeText('Adi')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Prisma')
            ->assertHeader('App', 'Laravel');
    }

    public function test_view()
    {
        $this->get('/response/type/view')
            ->assertSeeText('Halo Rizki');
    }
    
    public function test_json()
    {
        $this->get('/response/type/json')
            ->assertJson(['firstName' => 'Rizki', 'lastName' => 'Adi']);
    }
    
    public function test_file()
    {
        $this->get('/response/type/file')
            ->assertHeader('Content-Type', 'image/jpeg');
    }
    
    public function test_download()
    {
        $this->get('/response/type/download')
            ->assertDownload('rizki.jpg');
    }
}
