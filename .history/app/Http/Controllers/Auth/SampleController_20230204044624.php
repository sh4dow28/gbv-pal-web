<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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

        User::create([
            'codeUtil'      => Helper::IDGenerator(new User(), 'codeUtil', 'codeUtil', 6, 'EMP'),
            'nomUtil'       => $data['nomUtil'],
            'droitUtil'     => $data['droitUtil'],
            'pseudoUtil'    => $data['pseudoUtil'],
            'emailUtil'     => $data['emailUtil'],
            'password'       => Hash::make($data['mdpUtil']),
        ]);

        return back()->with('success', 'L\'utilisateur à été créer avec succès !');
    }

    function login(Request $request)
    {
        $credentials = $request->only('pseudoUtil', 'password');

        if (!Auth::attempt($request->only('pseudoUtil', 'password'))) {
            return $request;
            // echo "echec de la conn " . $credentials['mdpUtil'] . " - " . bcrypt($credentials['mdpUtil']);
            return redirect()->back()->with(['fail' => 'Echec de l\'authentification. Veuillez vérifier vos information et réessayer.']);
        } else {
            return redirect('home');
        }
    }

    function registration()
    {
        return view('auth.register');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
