<?php

namespace App\Http\Controllers;

use App\VarPhenoAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\VarPhenoAnnotation as VarPhenoAnnotationResource;

class VarPhenoAnnotationControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VarPhenoAnnotationResource::collection(VarPhenoAnnotation::paginate(10));

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
     * @param  \App\VarPhenoAnnotation  $varPhenoAnnotation
     * @return \Illuminate\Http\Response
     */
    public function show(VarPhenoAnnotation $varPhenoAnnotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VarPhenoAnnotation  $varPhenoAnnotation
     * @return \Illuminate\Http\Response
     */
    public function edit(VarPhenoAnnotation $varPhenoAnnotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VarPhenoAnnotation  $varPhenoAnnotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VarPhenoAnnotation $varPhenoAnnotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VarPhenoAnnotation  $varPhenoAnnotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VarPhenoAnnotation $varPhenoAnnotation)
    {
        //
    }
}