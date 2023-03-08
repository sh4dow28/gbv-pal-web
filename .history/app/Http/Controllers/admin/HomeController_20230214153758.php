<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductionBadge;
use App\Models\ProductionVignette;
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
            $totSociete = DB::select("SELECT COUNT(*) AS totSociete FROM tbl_societe");
            $totEmploye = DB::select("SELECT COUNT(*) AS totEmploye FROM tbl_employe");
            $totBVisiteur = DB::select("SELECT COUNT(*) AS totBVisiteur FROM tbl_badge_visiteur");
            array_push($data, $totBVisiteur, $totSociete, $totEmploye, $totVignette);
            dd($totVignette);
            return view('pages.home', compact('totBadge', 'totBVisiteur', 'totSociete', 'totEmploye', 'totVignette'));
        }
        return back();
    }
}
