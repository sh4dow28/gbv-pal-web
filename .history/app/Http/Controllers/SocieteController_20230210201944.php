<?php

namespace App\Http\Controllers;

use App\Models\RepresentantSociete;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.societies');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.societie-create');
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
            'raison_social'     => 'required',
            'domaineActivite'   => 'required',
            'telSoc'            => 'required',
            'mobileSoc'         => 'required',
            'emailSoc'          => 'email',
            'webSoc'            => 'required',
            'adrSoc'            => 'required',
            'qrtSoc'            => 'required',
            'villSoc'           => 'required',
            'paysSoc'           => 'required',
            'numFisc'           => 'required',
            'nomRep'            => 'required',
            'dobRep'            => 'required',
            'pobRep'            => 'required',
            'postRep'           => 'required',
            'telRep'            => 'required',
            'emailRep'          => 'required',
            'typeIDRep'         => 'required',
            'numIDRep'          => 'required',
        ]);
        $data = $request->all();

        if (($badge) && ($badge->etatVBadge == 'disponible')) {
            DB::beginTransaction();
            $representant = RepresentantSociete::create([
                'nomRep'    => $data['nomRep'],
                'dobRep'    => $data['dobRep'],
                'pobRep'    => $data['pobRep'],
                'postRep'   => $data['postRep'],
                'telRep'    => $data['telRep'],
                'emailRep'  => $data['emailRep'],
                'typeIDRep' => $data['typeIDRep'],
                'numIDRep'  => $data['numIDRep'],
            ]);
            $societie = Societe::create([
                'raison_social'     => 'required',
                'domaineActivite'   => 'required',
                'telSoc'            => 'required',
                'mobileSoc'         => 'required',
                'emailSoc'          => 'email',
                'webSoc'            => 'required',
                'adrSoc'            => 'required',
                'qrtSoc'            => 'required',
                'villSoc'           => 'required',
                'paysSoc'           => 'required',
                'numFisc'           => 'required',
            ]);
            // dd($visitor)->id;
            DB::update('UPDATE tbl_badge_visiteur SET etatVBadge = :etat WHERE numVBadge = :num', ['etat' => 'indisponible', 'num' => $request->no_badge]);
            DB::commit();
        }

        return back()->with('success', 'Badge ajouter avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(Societe $societe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(Societe $societe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Societe $societe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Societe $societe)
    {
        //
    }
}
