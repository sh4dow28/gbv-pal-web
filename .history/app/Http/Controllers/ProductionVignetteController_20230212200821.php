<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use App\Models\ProductionVignette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductionVignetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DemandeProduction::with(['employe', 'badges'])->where('typeProd', '=', 'vignette')->latest()->get();
        return view('pages.productions-vignettes', compact('data'));
    }

    public function registre()
    {
        $demandes = DemandeProduction::with(['employe'])->join('vignettes_production', 'tbl_demande_production.idProd', '=', 'vignettes_production.idProd')
            ->where('tbl_demande_production.statProd', '=', 'Terminé')
            ->get(['tbl_demande_production.*', 'vignettes_production.*'])->toArray();
        $data = DemandeProduction::with(['employe', 'vignettes'])->where('typeProd', '=', 'vignette')->where('statProd', '=', 'Terminé')->latest()->get();
        // dd($data);
        return view('pages.registre-vignette', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.production-vignette');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionVignette  $productionVignette
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionVignette $productionVignette)
    {
        //
    }

    public function withdrawal(Request $request)
    {
        $messages = [
            'idProd.required'       => 'Le numero de production est requis.',
            'idProd.exists'         => 'Le numero de production est introuvable.',
            'noVignette.required'   => 'Le numero de la vignette est requis.',
            'noVignette.unique'     => 'Le numero de vignette existe déjà.',
        ];
        $rules = [
            'idProd'        => 'bail|required|exists:vignettes_production',
            'noVignette'    => 'bail|required|unique:vignettes_production',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->stopOnFirstFailure()->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $vignette = DB::update('update tbl_demande_production,vignettes_production set vignettes_production.noVignette = :noVignette, tbl_demande_production.statProd = :stat where tbl_demande_production.idProd = vignettes_production.idProd and tbl_demande_production.idProd = :idProd', ['noVignette' => $request->noVignette, 'stat' => 'Terminé', 'idProd' => $request->idProd]);
        return back()->with('message', 'Opération effectuée avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionVignette  $productionVignette
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionVignette $productionVignette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionVignette  $productionVignette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionVignette $productionVignette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionVignette  $productionVignette
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionVignette $productionVignette)
    {
        //
    }
}
