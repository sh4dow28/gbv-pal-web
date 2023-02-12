<?php

namespace App\Http\Controllers;

use App\Models\BadgeVisiteur;
use App\Models\DemandeBadgeVisiteur;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeBadgeVisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select("SELECT demande_badge_visiteurs.status,demande_badge_visiteurs.dateDemBVisit, demande_badge_visiteurs.dateRetBVisit
        ,tbl_badge_visiteur.numVBadge, tbl_visiteur.nomVis, tbl_visiteur.id_typeVis, tbl_visiteur.num_idVis, tbl_visiteur.telVis
        FROM demande_badge_visiteurs, tbl_visiteur, tbl_badge_visiteur
        WHERE tbl_badge_visiteur.idVBadge=demande_badge_visiteurs.idVBadge AND demande_badge_visiteurs.idVis=tbl_visiteur.idVis;");
        return view('pages.vbadge-requests', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vbadge-request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // nomVis
        // id_typeVis
        // num_idVis
        // exp_idVis
        // telVis
        // no_badge
        $messages = [
            'nomVis.required'    => 'bail|required',
            'id_typeVis.required'     => 'bail|required',
            'num_idVis.required'    => 'bail|required',
            'exp_idVis.required'     => 'bail|required',
            'telVis.required'    => 'bail|required',
            'no_badge.required'     => 'Le numéro de badge est requis',
            'no_badge.exists'     => 'Le numero de badge entré n\'existe pas',
        ];
        $rules = [
            'nomVis'    => 'bail|required',
            'id_typeVis'     => 'bail|required',
            'num_idVis'    => 'bail|required',
            'exp_idVis'     => 'bail|required',
            'telVis'    => 'bail|required',
            'no_badge'     => 'bail|required|exists:tbl_badge_visiteur',
        ];
        $request->validate([
            'nomVis'    => 'required',
            'id_typeVis'     => 'required',
            'num_idVis'    => 'required',
            'exp_idVis'     => 'required',
            'telVis'    => 'required',
            'no_badge'     => 'required',
        ]);
        $data = $request->all();

        $badge = BadgeVisiteur::where('numVBadge', '=', $request->no_badge)->first();
        if (($badge) && ($badge->etatVBadge == 'disponible')) {
            DB::beginTransaction();
            $visitor = Visiteur::create([
                'nomVis'        => $data['nomVis'],
                'id_typeVis'    => $data['id_typeVis'],
                'num_idVis'     => $data['num_idVis'],
                'exp_idVis'     => $data['exp_idVis'],
                'telVis'        => $data['telVis'],
                'created_at'    => now(),
            ]);
            // dd($visitor)->id;
            DemandeBadgeVisiteur::create([
                'codeUtil'  => 'EMP-0000',
                'idVBadge'  => $badge->idVBadge,
                'idVis'     => $visitor->id,
            ]);
            DB::update('UPDATE tbl_badge_visiteur SET etatVBadge = :etat WHERE numVBadge = :num', ['etat' => 'indisponible', 'num' => $request->no_badge]);
            DB::commit();
        }

        return back()->with('success', 'Badge ajouter avec succès !');
    }

    public function end(Request $request)
    {
        $request->validate([
            'no_badge'     => 'required',
        ]);
        $data = $request->all();
        $badge = BadgeVisiteur::where('numVBadge', '=', $request->no_badge)->first();

        if (($badge) && ($badge->etatVBadge != 'disponible')) {
            DB::beginTransaction();
            DB::update('UPDATE demande_badge_visiteurs SET status = :stat, dateRetBVisit = :ret WHERE idVBadge = :badge', ['stat' => 'Terminer', 'ret' => now(), 'badge' => $badge->idVBadge]);
            DB::update('UPDATE tbl_badge_visiteur SET etatVBadge = :etat WHERE numVBadge = :num', ['etat' => 'disponible', 'num' => $request->no_badge]);
            DB::commit();
        }
        return back()->with('success', 'Badge retourner avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemandeBadgeVisiteur  $demandeBadgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function show(DemandeBadgeVisiteur $demandeBadgeVisiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandeBadgeVisiteur  $demandeBadgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandeBadgeVisiteur $demandeBadgeVisiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandeBadgeVisiteur  $demandeBadgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandeBadgeVisiteur $demandeBadgeVisiteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandeBadgeVisiteur  $demandeBadgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandeBadgeVisiteur $demandeBadgeVisiteur)
    {
        //
    }
}
