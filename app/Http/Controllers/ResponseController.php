<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): HttpResponse
    {
        return response('Halo Rizki!');
    }

    public function header(Request $request): HttpResponse
    {
        $body = [
            'firstName' => 'Rizki',
            'lastName' => 'Adi'
        ];

        return response(json_encode($body), 201)
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                'Author' => 'Prisma',
                'App' => 'Laravel'
            ]);
    }

    public function response_view(Request $request): HttpResponse
    {
        return response()->view('hello', ['name' => 'Rizki']);
    }

    public function response_json(Request $request): JsonResponse
    {
        $body = [
            'firstName' => 'Rizki',
            'lastName' => 'Adi'
        ];

        return response()->json($body);
    }

    public function response_file(Request $request): BinaryFileResponse
    {
        return response()->file(storage_path('app/public/pictures/rizki.jpg'));
    }

    public function response_download(Request $request): BinaryFileResponse
    {
        return response()->download(storage_path('app/public/pictures/rizki.jpg'),' rizki.jpg');
    }
}
