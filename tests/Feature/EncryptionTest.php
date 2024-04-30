<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $encrypt = Crypt::encrypt('Rizki Adi');
        var_dump($encrypt);

        $decrypt = Crypt::decrypt($encrypt);
        var_dump($decrypt);

        self::assertEquals('Rizki Adi', $decrypt);
    }
}
