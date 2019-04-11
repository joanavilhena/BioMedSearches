<?php

namespace App\Http\Controllers;

use App\ClinicalAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\ClinicalAnnotation as ClinicalAnnotationResource;


class ClinicalAnnotationControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClinicalAnnotationResource::collection(ClinicalAnnotation::paginate(10));
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
     * @param  \App\ClinicalAnnotations  $clinicalAnnotations
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicalAnnotations $clinicalAnnotations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicalAnnotations  $clinicalAnnotations
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalAnnotations $clinicalAnnotations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicalAnnotations  $clinicalAnnotations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicalAnnotations $clinicalAnnotations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicalAnnotations  $clinicalAnnotations
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicalAnnotations $clinicalAnnotations)
    {
        //
    }
}
