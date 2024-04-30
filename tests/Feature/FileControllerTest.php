<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $image = HttpUploadedFile::fake()->image('rizki.jpg');

        $this->post('/file/upload', [
            'picture' => $image
        ])->assertSeeText('OK rizki.jpg');
    }
}
