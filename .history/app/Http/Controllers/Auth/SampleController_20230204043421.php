<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function validate_register(Request $request)
    {
        $request->validate([
            'nomUtil'      => 'required',
            'pseudoUtil'  => 'required|unique:tbl_utilisateur',
            'mdpUtil'  => 'required|min:6',
            'droitUtil'      => 'required'
        ]);

        $data = $request->all();

        Utilisateur::create([
            'codeUtil'      => Helper::IDGenerator(new Utilisateur(), 'codeUtil', 'codeUtil', 6, 'EMP'),
            'nomUtil'       => $data['nomUtil'],
            'droitUtil'     => $data['droitUtil'],
            'pseudoUtil'    => $data['pseudoUtil'],
            'emailUtil'     => $data['emailUtil'],
            'mdpUtil'       => Hash::make($data['mdpUtil']),
        ]);

        return back()->with('success', 'L\'utilisateur à été créer avec succès !');
    }

    function login(Request $request)
    {
        $request->validate([
            'pseudoUtil'   => 'required',
            'mdpUtil'      => 'required'
        ]);
        // check username
        $userInfos = Utilisateur::where('pseudoUtil', '=', $request->pseudoUtil)->first();

        if (!$userInfos) {
            return redirect()->back()->with(['fail' => 'Echec de l\'authentification. Ne nous retrouvons pas le nom d\'utilisateur.']);
        } else {
            // check password
            if (Hash::check($request->mdpUtil, $userInfos->mdpUtil)) {
                $request->session()->put('LoggedUser', $userInfos->codeUtil);
                return redirect('home');
            } else {
                return redirect()->back()->with(['fail' => 'Mot de passe incorrect.']);
            }
        }
        // $credentials = $request->only('pseudoUtil', 'mdpUtil');

        // if (!Auth::attempt($request->only('pseudoUtil', 'mdpUtil'))) {
        //     return $request;
        //     // echo "echec de la conn " . $credentials['mdpUtil'] . " - " . bcrypt($credentials['mdpUtil']);
        //     return redirect()->back()->with(['fail' => 'Echec de l\'authentification. Veuillez vérifier vos information et réessayer.']);
        // } else {
        //     return redirect('home');
        // }
    }

    function registration()
    {
        return view('auth.register');
    }

    function logout()
    {
        // Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
