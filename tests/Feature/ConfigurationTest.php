<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_config()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Rizki', $firstName);
        self::assertEquals('Adi', $lastName);
        self::assertEquals('rizkiadi@prisma.com', $email);
        self::assertEquals('https://www.onprisma.com', $web);
    }
}
