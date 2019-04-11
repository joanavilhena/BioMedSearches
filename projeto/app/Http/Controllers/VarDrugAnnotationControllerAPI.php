<?php

namespace App\Http\Controllers;

use App\VarDrugAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\VarDrugAnnotation as VarDrugAnnotationResource;




class VarDrugAnnotationControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VarDrugAnnotationResource::collection(VarDrugAnnotation::paginate(10));

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
     * @param  \App\VarDrugAnnotation  $varDrugAnnotation
     * @return \Illuminate\Http\Response
     */
    public function show(VarDrugAnnotation $varDrugAnnotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VarDrugAnnotation  $varDrugAnnotation
     * @return \Illuminate\Http\Response
     */
    public function edit(VarDrugAnnotation $varDrugAnnotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VarDrugAnnotation  $varDrugAnnotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VarDrugAnnotation $varDrugAnnotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VarDrugAnnotation  $varDrugAnnotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VarDrugAnnotation $varDrugAnnotation)
    {
        //
    }
}
