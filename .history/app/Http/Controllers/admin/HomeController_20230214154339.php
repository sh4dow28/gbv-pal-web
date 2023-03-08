<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BadgeVisiteur;
use App\Models\Employe;
use App\Models\ProductionBadge;
use App\Models\ProductionVignette;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function Dashboard()
    {
        // dd(Session::get('loginID')->nomUtil);
        if (Session::has('loginID')) {
            $data = array();
            $totBadge = ProductionBadge::where('noBadge', '!=', '')->count();
            $totVignette = ProductionVignette::where('noVignette', '!=', '')->count();
            $totSociete = Societe::all()->count();
            $totEmploye = Employe::all()->count();
            $totBVisiteur = BadgeVisiteur::all()->count();
            $data = [
                'totBadge'      => $totBadge,
                'totVignette'   => $totVignette,
                'totSociete'    => $totSociete,
                'totEmploye'    => $totEmploye,
                'totBVisiteur'  => $totBVisiteur,
            ];
            // array_push($data, $totBVisiteur, $totSociete, $totEmploye, $totVignette);
            dd($data);
            return view('pages.home', compact('totBadge', 'totBVisiteur', 'totSociete', 'totEmploye', 'totVignette'));
        }
        return back();
    }
}
