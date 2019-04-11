<?php

namespace App\Http\Controllers;

use App\Phenotype;
use Illuminate\Http\Request;
use App\Http\Resources\Phenotype as PhenotypeResource;


class PhenotypeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhenotypeResource::collection(Phenotype::paginate(10));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phenotype  $phenotype
     * @return \Illuminate\Http\Response
     */
    public function show(Phenotype $phenotype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phenotype  $phenotype
     * @return \Illuminate\Http\Response
     */
    public function edit(Phenotype $phenotype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phenotype  $phenotype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phenotype $phenotype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phenotype  $phenotype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phenotype $phenotype)
    {
        //
    }
}
