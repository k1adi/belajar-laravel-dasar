<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('userLoggedIn', 'Rizki Adi');
        $request->session()->put('isMember', true);

        return "OK";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get('userLoggedIn', 'Guest');
        $isMember = $request->session()->get('isMember', false);

        return "User : $userId, Is Member: $isMember";
    }
}
