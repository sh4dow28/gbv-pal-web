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
            'nomUtil'       => 'bail|required',
            'email'         => 'bail|required|email|unique:tbl_utilisateur',
            'droitUtil'     => 'bail|required',
            'pseudoUtil'    => 'bail|required|unique:tbl_utilisateur',
            'password'      => 'bail|required',
        ];
        $messages = [
            'nomUtil.required'   => 'Le nom complet de l\'utilisateur est requis',
            'email.required'     => 'L\'adresse email de l\'utilisateur est obligatoire',
            'droitUtil.required'   => 'Choissisez l\'acces de l\'utilisateur',
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
