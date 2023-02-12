<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use App\Models\Employe;
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
            'zoneAcc.required'           => 'Veuillez choisir la ou les installation portuaire à accéder.',
            'typeProd.required'     => 'Erreur ! Type de production introuvable.',
            'numFisc.required'      => 'Le numéro fiscale est obligatoire',
            'numFisc.exists'        => 'Ce numéro d\'identification fiscal n\'existe pas.',
            'typeIDEmp.required'    => 'Le type de pièce d\'identité est requis',
            'numIDEmp.required'     => 'La pièce d\'identité  est requis',
            'numIDRep.unique'       => 'Duplication du numéro de la pièce d\'identité du représentant',
            'posteEmp.required'     => 'Le poste de l\'employé est requis.',
            'nomEmp.required'       => 'Le nom de l\employé est requis.',
            'prenomEmp.required'    => 'Le prénom de l\'employé est requis.',
            'adrEmp.required'       => 'L\'adresse de l\'employé est obligatoire.',
            'telEmp.required'       => 'Le téléphone de l\'employé est requis.',
            'telEmp.integer'        => 'Le numéro de téléphone doit contenir uniquement des chiffres.',
            'dobEmp.before'         => 'La date de naissance doit être inférieure à aujourdh\'hui.',
            'expIDEmp.after'        => 'La date d\'expiration est incorrecte.',
            'dobEmp.required'       => 'La date de naissance est obligatoire.',
            'typeVeh.required'      => 'Le type de véhicule est requis.',
            'coulVeh.required'      => 'La couleur du véhicule est requis.',
            'immaVeh.required'      => 'L\immatriculation est requis.',
            'noBadge.required'      => 'Le numéro de badge de l\'employé est obligatoire.',
            'typeBadgeProd.required'    => 'Veuillez choisir le type de badge.',
            'nationEmp.required'    => 'La nationnalité de l\'employé est requis.',
            'sexeEmp.required'      => 'Veuillez choisir le sexe de l\'employé.',
            'expIDEmp.required'     => 'La date d\'expiration de la pièce d\'identité de l\'employé est requis.',
        ];

        if ($request->typeProd == 'badge') {
            $rules = [
                'zoneAcc'       => 'bail|array|required',
                'typeProd'      => 'bail|required',
                'typeBadgeProd' => 'bail|required',
                'nomEmp'        => 'bail|',
                'prenomEmp'     => 'bail|required',
                'dobEmp'        => 'bail|required|date|before:yesterday',
                'nationEmp'     => 'bail|required',
                'sexeEmp'       => 'bail|required',
                'adrEmp'        => 'bail|required',
                'telEmp'        => 'bail|integer|required',
                'posteEmp'      => 'bail|required',
                'typeIDEmp'     => 'bail|required',
                'numIDEmp'      => 'bail|required',
                'expIDEmp'      => 'bail|date|required|after:tomorrow',
                'numFisc'       => 'bail|exists:tbl_societe',
            ];
        } else if ($request->typeProd == 'vignette') {
            $rules = [
                'typeProd'  => 'bail|required',
                'zoneAcc'   => 'bail|required|array|min:1',
                'noBadge'   => 'bail|required|exists:badges_production',
                'typeVeh'   => 'bail|required',
                'coulVeh'   => 'bail|required',
                'immaVeh'   => 'bail|required',
                // 'numFisc'   => 'bail|required|exists:tbl_societe',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->stopOnFirstFailure()->fails() || (sizeof($request->zoneAcc) == 0)) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // implode(",", $request->zoneAcc)
            DB::beginTransaction();
            if ($request->typeProd == "badge") {
                $societe = Societe::where('numFisc', '=', $request->numFisc)->first();
                $employe = Employe::create([
                    'nomEmp'    => $request->nomEmp,
                    'prenomEmp' => $request->prenomEmp,
                    'pereEmp'   => $request->pereEmp,
                    'mereEmp'   => $request->mereEmp,
                    'dobEmp'    => $request->dobEmp,
                    'pobEmp'    => $request->pobEmp,
                    'nationEmp' => $request->nationEmp,
                    'sexeEmp'   => $request->sexeEmp,
                    'adrEmp'    => $request->adrEmp,
                    'telEmp'    => $request->telEmp,
                    'posteEmp'  => $request->posteEmp,
                    'typeIDEmp' => $request->typeIDEmp,
                    'numIDEmp'  => $request->numIDEmp,
                    'expIDEmp'  => $request->expIDEmp,
                    'idSoc'     => $societe->idSoc,
                ]);
                // dd($employe);
                $production = DemandeProduction::create([
                    'zoneAcc'   => implode("|", $request->zoneAcc),
                    'typeProd'  => $request->typeProd,
                    'statProd'  => "En cours",
                    'codeUtil'  => "EMP-0000",
                    'idEmp'     => $employe->id,
                ]);



                ProductionBadge::create([
                    'idProd'        => $production->id,
                    'typeBadgeProd' => $request->typeBadgeProd,
                ]);
            } else {
                // ProductionBadge::where('noBadge', '=', $request->noBadge)
                $badge = DB::select("SELECT * FROM badges_production WHERE noBadge = :badge", ['badge' => $request->noBadge])[0];
                $idProd = $badge['idProd'];
                dd($badge['idProd']);
                $parent_prod = DemandeProduction::where('idProd', '=', $idProd);
                $production = DemandeProduction::create([
                    'zoneAcc'   => implode("|", $request->zoneAcc),
                    'typeProd'  => $request->typeProd,
                    'statProd'  => "En cours",
                    'codeUtil'  => "EMP-0000",
                    'idEmp'     => $parent_prod->idEmp,
                ]);
                ProductionVignette::create([
                    'idProd'    => $production->id,
                    'typeVeh'   => $request->typeVeh,
                    'coulVeh'   => $request->colVeh,
                    'immaVeh'   => $request->immaVeh,
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
