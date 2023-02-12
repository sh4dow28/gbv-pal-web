<?php

namespace App\Http\Controllers;

use App\Models\BadgeVisiteur;
use Illuminate\Http\Request;

class BadgeVisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BadgeVisiteur::all();
        return view('pages.vbadges', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vbadge-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'typeVBadge'    => 'required',
            'numVBadge'     => 'required|unique:tbl_badge_visiteur',
        ]);
        $data = $request->all();
        if ($request->typeVBadge != '0') {
            BadgeVisiteur::create([
                'typeVBadge'    => $data['typeVBadge'],
                'numVBadge'     => $data['typeVBadge'] . '-' . $data['numVBadge'],
                'etatVBadge'    => 'disponible',
            ]);
        }

        return back()->with('success', 'Badge ajouter avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BadgeVisiteur  $badgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function show(BadgeVisiteur $badgeVisiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BadgeVisiteur  $badgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(BadgeVisiteur $badgeVisiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BadgeVisiteur  $badgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BadgeVisiteur $badgeVisiteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BadgeVisiteur  $badgeVisiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($idVBadge)
    {
        $vbadge = BadgeVisiteur::where('idVBadge', '=', $idVBadge);
        $vbadge->delete();
        return back()->with('success', 'Badge supprimé avec succès !');
    }
}
