<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class TryFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_value_env()
    {
        $bussinessUnit = Env::get('BUSSINESS_UNIT');

        self::assertEquals('PRISMA Enterprindo', $bussinessUnit);
    }

    public function test_default_env()
    {
        $department = env('DEPARTMENT', 'ICT');

        self::assertEquals('ICT', $department);
    }
}
