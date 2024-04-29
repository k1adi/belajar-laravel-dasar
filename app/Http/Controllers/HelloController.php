<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService){
        $this->helloService = $helloService;
    }

    public function index(string $name): string {
        return $this->helloService->hello($name);
    }

    public function world() {
        return view('hello.world', ['name' => 'rizki']);
    }
}
