<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return 'Redirect to';
    }

    public function redirectFrom(): RedirectResponse
    {
        // Redirect to path
        return redirect('/redirect/to');
    }

    public function redirectHello(string $name): string
    {
        return "Hello $name";
    }

    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect.hello', [
            'name' => 'rizki'
        ]);
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class, 'redirectHello'], [
            'name' => 'rizki'
        ]);
    }

    public function redirectAway(): RedirectResponse
    {
        return redirect()->away('https://ganyem.netlify.app');
    }
}
