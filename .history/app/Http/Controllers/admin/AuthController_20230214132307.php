<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $messages = [
            'nomUtil.required'      => 'Le nom d\'utilisateur est requis',
            'password.required'     => 'Entrez votre mot de passe',
        ];

        $rules = [
            'nomUtil'       => 'bail|required',
            'password'      => 'bail|required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->stopOnFirstFailure()->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    }
}
