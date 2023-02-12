<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use App\Models\ProductionBadge;
use App\Models\ProductionVignette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DemandeProductionController extends Controller
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
        $messages = [
            'zoneAcc.min' => 'Veuillez choisir la ou les installation portuaire à accéder.',
            'typeProd.required' => 'Erreur ! Type de production introuvable.',
            'numFisc.required'   => 'Le numéro fiscale est obligatoire',
            'numFisc.unique'    => 'Ce numéro d\'identification fiscal existe déjà',
            'emailRep.unique'   => 'Duplication de l\'email du représentant',
            'typeIDRep.required'   => 'Le type de pièce d\'identité du représentant est requis',
            'numIDRep.required'   => 'La pièce d\'identité du représentant est requis',
            'numIDRep.unique'   => 'Duplication du numéro de la pièce d\'identité du représentant',
            'postRep.required'   => 'Le poste du représentant est requis.',
            'nomRep.required'   => 'Le nom du représentant est requis.',
            'adrSoc.required'   => 'L\'adresse de la société est requis.',
            'telRep.required'   => 'Le téléphone de la société est requis.',
            'telRep.integer'   => 'Le numéro de téléphone doit contenir uniquement des chiffres.',
            'dobRep.before'   => 'La date de naissance doit être inférieure à aujourdh\'hui.',

        ];

        $rules = [
            'zoneAcc'     => 'bail|array|min:1',
            'typeProd'   => 'bail|required',
            'idEmp'            => 'bail|required',
            'typeBadgeProd'         => 'bail|required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // implode(",", $request->zoneAcc)
            $data = $request->all();
            DB::beginTransaction();
            $production = DemandeProduction::create([
                'zoneAcc'    => $data['nomRep'],
                'typeProd'    => $data['dobRep'],
                'statProd'    => $data['pobRep'],
                'codeUtil'  => 'EMP-0000',
                'idEmp' => $data['typeIDRep'],
            ]);
            // dd($representant->id);
            $idProd = $production->id;
            if ($request->typeProd == "Badge") {
                ProductionBadge::create([
                    'typeBadgeProd'     => $data['raison_social'],
                ]);
            } else {
                ProductionVignette::create([
                    'typeVeh'     => $data['raison_social'],
                    'coulVeh'   => $data['domaineActivite'],
                    'immaVeh'            => $data['telSoc'],
                    'noVignette'         => $data['mobileSoc'],
                ]);
            }

            DB::commit();
        }

        return back()->with('message', 'Demande de Production enregistrer avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemandeProduction  $demandeProduction
     * @return \Illuminate\Http\Response
     */
    public function show(DemandeProduction $demandeProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandeProduction  $demandeProduction
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandeProduction $demandeProduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandeProduction  $demandeProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandeProduction $demandeProduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandeProduction  $demandeProduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandeProduction $demandeProduction)
    {
        //
    }
}
