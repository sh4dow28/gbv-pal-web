<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use App\Models\ProductionBadge;
use App\Models\ProductionVignette;
use App\Models\Societe;
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
            'numFisc.exists'    => 'Ce numéro d\'identification fiscal n\'existe pas.',
            'typeIDEmp.required'   => 'Le type de pièce d\'identité est requis',
            'numIDEmp.required'   => 'La pièce d\'identité  est requis',
            'numIDRep.unique'   => 'Duplication du numéro de la pièce d\'identité du représentant',
            'postRep.required'   => 'Le poste du représentant est requis.',
            'nomRep.required'   => 'Le nom du représentant est requis.',
            'adrSoc.required'   => 'L\'adresse de la société est requis.',
            'telRep.required'   => 'Le téléphone de la société est requis.',
            'telRep.integer'   => 'Le numéro de téléphone doit contenir uniquement des chiffres.',
            'dobEmp.before'   => 'La date de naissance doit être inférieure à aujourdh\'hui.',

        ];

        if ($request->typeProd == 'badge') {
            $rules = [
                'zoneAcc'     => 'bail|array|min:1',
                'typeProd'   => 'bail|required',
                'idEmp'            => 'bail|required',
                'typeBadgeProd'         => 'bail|required',
                'nomEmp'     => 'bail|array|min:1',
                'prenomEmp'   => 'bail|required',
                'dobEmp'     => 'bail|required|date|before:yesterday',
                'nationEmp'            => 'bail|string|required',
                'sexeEmp'         => 'bail|string|required',
                'adrEmp'     => 'bail|string|required',
                'telEmp'   => 'bail|numeric|required',
                'posteEmp'            => 'bail|string|required',
                'typeIDEmp'         => 'bail|string|required',
                'numIDEmp'     => 'bail|string|required',
                'expIDEmp'   => 'bail|date|required',
                'numFisc'            => 'bail|exists:tbl_societe',
            ];
        } else if ($request->typeProd == 'vignette') {
            $rules = [
                'zoneAcc'     => 'bail|array|min:1',
                'typeProd'   => 'bail|required',
                'idEmp'            => 'bail|required',
                'typeVeh'         => 'bail|required',
                'coulVeh'         => 'bail|required',
                'immaVeh'         => 'bail|required',
                'numFisc'            => 'bail|required|exists:tbl_societe',
                'noBadge'            => 'bail|required|exists:badges_production',
            ];
        }

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
