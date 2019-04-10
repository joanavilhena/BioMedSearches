<?php

namespace App\Http\Controllers;

use App\Chemical;
use Illuminate\Http\Request;
use App\Http\Resources\Chemical as ChemicalResource;

class ChemicalControllerAPI extends Controller
{
    





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ChemicalResource::collection(Chemical::paginate(10));
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
     * @param  \App\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function show(Chemicals $chemicals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function edit(Chemicals $chemicals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chemicals $chemicals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chemicals  $chemicals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chemicals $chemicals)
    {
        //
    }
}
