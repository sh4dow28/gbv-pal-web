<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductionBadge;
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
            $tt = ProductionBadge::where('noBadge', '!=', '')->count();
            $totBadge = DB::select("SELECT COUNT(*) AS totBadge FROM badges_production WHERE noBadge != :val", ['val' => '']);
            $totVignette = DB::select("SELECT COUNT(*) AS totVignette FROM vignettes_production WHERE noVignette != :val", ['val' => '']);
            $totSociete = DB::select("SELECT COUNT(*) AS totSociete FROM tbl_societe");
            $totEmploye = DB::select("SELECT COUNT(*) AS totEmploye FROM tbl_employe");
            $totBVisiteur = DB::select("SELECT COUNT(*) AS totBVisiteur FROM tbl_badge_visiteur");
            array_push($data, $totBVisiteur, $totSociete, $totEmploye, $totVignette);
            dd($tt);
            return view('pages.home', compact('totBadge', 'totBVisiteur', 'totSociete', 'totEmploye', 'totVignette'));
        }
        return back();
    }
}
