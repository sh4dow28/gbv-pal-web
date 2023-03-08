<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);

        $rules = [
            'nomUtil'    => 'bail|required',
            'email'      => 'bail|required',
            'droitUtil'    => 'bail|required',
            'pseudoUtil'    => 'bail|required',
            'password'      => 'bail|required',
        ];
        $messages = [
            'pseudoUtil.required'   => 'Le nom d\'utilisateur est requis',
            'password.required'     => 'Entrez votre mot de passe',
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
