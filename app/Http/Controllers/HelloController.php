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

    public function index(Request $request, string $name): string {
        return $this->helloService->hello($name);
    }

    public function request(Request $request){
        return $request->path() . PHP_EOL . 
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->header('Accept');
    }

    public function world() {
        return view('hello.world', ['name' => 'rizki']);
    }
}
