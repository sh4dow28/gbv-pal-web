<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('nomUtil', '=', $request->nomUtil);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('logginID', $user->codeUtil);
                return redirect('home');
            } else {
                return redirect()
                    ->back()
                    ->with('fail', 'Mot de passe incorrect.')
                    ->withInput();
            }
        } else {
            return redirect()
                ->back()
                ->with('fail', 'Le nom d\'utilisateur est introuvable.')
                ->withInput();
        }
    }
}
