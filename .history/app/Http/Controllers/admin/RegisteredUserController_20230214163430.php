<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'nomUtil.required'      => 'Le nom complet de l\'utilisateur est requis',
            'email.required'        => 'L\'adresse email de l\'utilisateur est obligatoire',
            'email.unique'          => 'L\'adresse email de l\'utilisateur existe d"jà',
            'droitUtil.required'    => 'Choissisez l\'acces de l\'utilisateur',
            'pseudoUtil.required'   => 'Le nom d\'utilisateur est requis',
            'pseudoUtil.unique'     => 'Le nom d\'utilisateur existe déjà',
            'password.required'     => 'Entrez votre mot de passe',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->stopOnFirstFailure()->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create(
            [
                "nomUtil" => $request->nomUtil,
                "email" => $request->email,
                "droitUtil" => $request->droitUtil,
                "pseudoUtil" => $request->pseudoUtil,
                "password" => Hash::make($request->password),
            ]
        );
        return redirect()
            ->back()
            ->with('message', 'Compte créer avec succès.')
            ->withInput();
    }
}
