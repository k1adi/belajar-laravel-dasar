<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/input/hello?name=Rizki')
            ->assertSeeText('Hello Rizki');

        $this->post('/input/hello', [
            'name' => 'Rizki'
        ])->assertSeeText('Hello Rizki');
    }

    public function test_nested()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Rizki',
                'last' => 'Adi'
            ]
        ])->assertSeeText('Hello Rizki');
    }

    
    public function test_json()
    {
        $this->post('/input/hello/json', [
            'name' => [
                'first' => 'Rizki',
                'last' => 'Adi'
            ]
        ])->assertSeeText('name')->assertSeeText('first')->assertSeeText('last')->assertSeeText('Rizki')->assertSeeText('Adi');
    }

    public function test_array()
    {
        $this->post('/input/hello/array', [
            'products' => [
                ['name' => 'Lenovo S-340'],
                ['name' => 'Advan WorkPlus']
            ]
        ])->assertSeeText('Lenovo S-340')->assertSeeText('Advan WorkPlus');
    }

    public function test_type()
    {
        $this->post('/input/type', [
            'name' => 'Rizki',
            'married' => 'false',
            'birth_date' => '2000-01-01'
        ])->assertSeeText('Rizki')->assertSeeText('false')->assertSeeText('2000-01-01');
    }

    public function test_only()
    {
        $this->post('/input/filter/only', [
            'name' => [
                'first' => 'Rizki',
                'middle' => 'Adi',
                'last' => 'Nugroho'
            ]
        ])->assertSeeText('Rizki')->assertSeeText('Nugroho')->assertDontSeeText('Adi');
    }
    
    public function test_except()
    {
        $this->post('/input/filter/except', [
            'username' => 'Rizki',
            'password' => 'Adi',
            'admin' => 'true'
        ])->assertSeeText('Rizki')->assertSeeText('Adi')->assertDontSeeText('admin');
    }
    
    public function test_merge()
    {
        $this->post('/input/filter/merge', [
            'username' => 'Rizki',
            'password' => 'Adi',
            'admin' => 'true'
        ])->assertSeeText('Rizki')->assertSeeText('Adi')->assertSeeText('false');
    }
}
