<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use Illuminate\Http\Request;

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
            'raison_social.required' => 'La raison sociale de la société est obligatoire.',
            'raison_social.unique' => 'Ce nom existe déjà pour une société.',
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
            'raison_social'     => 'required|unique:tbl_societe',
            'domaineActivite'   => 'required',
            'telSoc'            => 'required',
            'mobileSoc'         => 'required',
            'emailSoc'          => 'email|nullable',
            'webSoc'            => 'nullable',
            'adrSoc'            => 'required',
            'qrtSoc'            => 'required',
            'villSoc'           => 'required',
            'paysSoc'           => 'required',
            'numFisc'           => 'required|unique:tbl_societe',
            'nomRep'            => 'required',
            'dobRep'            => 'date|before:today',
            'pobRep'            => 'required',
            'postRep'           => 'required',
            'telRep'            => 'required|integer',
            'emailRep'          => 'nullable|unique:tbl_rep_societe',
            'typeIDRep'         => 'required',
            'numIDRep'          => 'required|unique:tbl_rep_societe',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
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
            // dd($representant->id);
            $idRep = $representant->id;
            Societe::create([
                'raison_social'     => $data['raison_social'],
                'domaineActivite'   => $data['domaineActivite'],
                'telSoc'            => $data['telSoc'],
                'mobileSoc'         => $data['mobileSoc'],
                'emailSoc'          => $data['emailSoc'],
                'webSoc'            => $data['webSoc'],
                'adrSoc'            => $data['adrSoc'],
                'qrtSoc'            => $data['qrtSoc'],
                'villSoc'           => $data['villSoc'],
                'paysSoc'           => $data['paysSoc'],
                'numFisc'           => $data['numFisc'],
                'idRep'             => $idRep,
            ]);
            DB::commit();
        }

        return back()->with('message', 'Sociéte ajouter avec succès !');
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
