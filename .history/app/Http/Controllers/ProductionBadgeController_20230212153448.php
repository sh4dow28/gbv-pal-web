<?php

namespace App\Http\Controllers;

use App\Models\DemandeProduction;
use App\Models\ProductionBadge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductionBadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DemandeProduction::with(['employe', 'badges'])->where('typeProd', '=', 'badge')->latest()->get();
        // dd($data);
        return view('pages.productions-badges', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.production-badge');
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
            'idProd.required'   => 'Production introuvable',
            'noBadge.required'  => 'Entrez le numero du badge produit',
            'noBadge.unique'    => 'Ce numero de badge existe déjà',
        ];
        $rules = [
            'idProd'    => 'bail|required',
            'noBadge'   => 'bail|required|unique:badges_production',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionBadge  $productionBadge
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionBadge $productionBadge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionBadge  $productionBadge
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionBadge $productionBadge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionBadge  $productionBadge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionBadge $productionBadge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionBadge  $productionBadge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionBadge $productionBadge)
    {
        //
    }
}
