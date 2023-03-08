<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return 'Registration view';
    }

    public function store(Request $request)
    {
        return 'Register';
    }
}
