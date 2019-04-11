<?php

namespace App\Http\Controllers;

use App\VarFaAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\VarFaAnnotation as VarFaAnnotationResource;


class VarFaAnnotationControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VarFaAnnotationResource::collection(VarFaAnnotation::paginate(10));

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
     * @param  \App\VarFaAnnotation  $varFaAnnotation
     * @return \Illuminate\Http\Response
     */
    public function show(VarFaAnnotation $varFaAnnotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VarFaAnnotation  $varFaAnnotation
     * @return \Illuminate\Http\Response
     */
    public function edit(VarFaAnnotation $varFaAnnotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VarFaAnnotation  $varFaAnnotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VarFaAnnotation $varFaAnnotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VarFaAnnotation  $varFaAnnotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VarFaAnnotation $varFaAnnotation)
    {
        //
    }
}
