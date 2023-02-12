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
        //
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
            // dd($visitor)->id;
            DemandeBadgeVisiteur::create([
                'codeUtil'  => 'EMP-0000',
                'idVBadge'  => $badge->idVBadge,
                'idVis'     => $visitor->id,
            ]);
            DB::update('UPDATE demande_badge_visiteurs SET status = :stat WHERE idVBadge = :badge', ['stat' => 'Terminer', 'badge' => $badge->idVBadge]);
            DB::update('UPDATE tbl_badge_visiteur SET etatVBadge = :etat WHERE numVBadge = :num', ['etat' => 'disponible', 'num' => $request->no_badge]);
            DB::commit();
        }
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
