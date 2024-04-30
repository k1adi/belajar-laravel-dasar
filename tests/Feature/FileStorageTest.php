<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put('file.txt', 'Rizki Adi');

        $content = $filesystem->get('file.txt');
        self::assertEquals('Rizki Adi', $content);
    }

    public function test_public()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('file.txt', 'Rizki Adi');

        $content = $filesystem->get('file.txt');
        self::assertEquals('Rizki Adi', $content);
    }
}
