<?php

namespace App\Http\Controllers;

use App\Models\RepresentantSociete;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                'idRep'             => $representant->id,
            ]);
            DB::commit();
        }

        return back()->with('message', 'Sociéte ajouter avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show($societe)
    {
        $societie = Societe::where('numFisc', '=', $societe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit($societe)
    {
        $societie = Societe::where('numFisc', '=', $societe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $societe)
    {
        $societie = Societe::where('numFisc', '=', $societe);
        return back()->with('success', 'Société supprimé avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy($societe)
    {
        $societie = Societe::where('numFisc', '=', $societe);
        $societie->delete();
        return back()->with('success', 'Société supprimé avec succès !');
    }
}
