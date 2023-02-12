<?php

namespace App\Http\Controllers;

use App\Models\BadgeVisiteur;
use App\Models\DemandeBadgeVisiteur;
use App\Models\Visiteur;
use Illuminate\Http\Request;

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
        //
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
        if ($badge->etatVBadge == 'disponible') {
            Visiteur::create([
                'nomVis'        => $data['nomVis'],
                'id_typeVis'    => $data['id_typeVis'],
                'num_idVis'     => $data['num_idVis'],
                'exp_idVis'     => $data['exp_idVis'],
                'telVis'        => $data['telVis'],
            ]);
            DemandeBadgeVisiteur::create([
                //         'codeUtil',
                // 'idVBadge',
                // 'idVis',
                // 'dateRetBVisit',
                'codeUtil'  => 'EMP-0000',
                'idVBadge'  => $badge->idVBadge,
                'idVis'     => $data['typeVBadge']
            ]);
        }

        return back()->with('success', 'Badge ajouter avec succès !');
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
