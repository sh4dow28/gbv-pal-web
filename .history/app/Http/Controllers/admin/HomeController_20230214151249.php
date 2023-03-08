<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            $totBadge = DB::select("SELECT COUNT(*) FROM badges_production WHERE noBadge != :val", ['val', '']);
            $totVignette = DB::select("SELECT COUNT(*) FROM vignettes_production WHERE noVignette != :val", ['val', '']);
            $totSociete = DB::select("SELECT COUNT(*) FROM tbl_societe");
            $totEmploye = DB::select("SELECT COUNT(*) FROM tbl_employe");
            $totBVisiteur = DB::select("SELECT COUNT(*) FROM tbl_badge_visiteur");
            array_push($data, $totBadge, $totBVisiteur, $totSociete, $totEmploye, $totVignette);
            return view('pages.home');
        }
        return back();
    }
}
