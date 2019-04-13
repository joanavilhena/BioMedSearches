<?php

namespace App\Http\Controllers;

use App\ClinicalVariant;
use Illuminate\Http\Request;
use App\Http\Resources\ClinicalVariant as ClinicalVariantResource;

class ClinicalVariantControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClinicalVariantResource::collection(ClinicalVariant::paginate(10));
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
     * @param  \App\ClinicalVariant  $clinicalVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicalVariant $clinicalVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicalVariant  $clinicalVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalVariant $clinicalVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicalVariant  $clinicalVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicalVariant $clinicalVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicalVariant  $clinicalVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicalVariant $clinicalVariant)
    {
        //
    }
}