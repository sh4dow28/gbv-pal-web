<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        echo 'ok';
        return redirect()->intended(RouteServiceProvider::HOME);

        // check username
        // $userInfos = User::where('pseudoUtil', '=', $request->pseudoUtil)->first();

        // if (!$userInfos) {
        //     return redirect()->back()->with(['fail' => 'Echec de l\'authentification. Ne nous retrouvons pas le nom d\'utilisateur.']);
        // } else {
        //     // check password
        //     if (Hash::check($request->mdpUtil, $userInfos->mdpUtil)) {
        //         $request->session()->put('LoggedUser', $userInfos->codeUtil);
        //         return redirect('home');
        //     } else {
        //         return redirect()->back()->with(['fail' => 'Mot de passe incorrect.']);
        //     }
        // }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
