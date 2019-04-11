<?php

namespace App\Http\Controllers;

use App\StudyParameter;
use Illuminate\Http\Request;
use App\Http\Resources\StudyParameter as StudyParameterResource;


class StudyParameterControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudyParameterResource::collection(StudyParameter::paginate(10));

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
     * @param  \App\StudyParameter  $studyParameter
     * @return \Illuminate\Http\Response
     */
    public function show(StudyParameter $studyParameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudyParameter  $studyParameter
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyParameter $studyParameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudyParameter  $studyParameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyParameter $studyParameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudyParameter  $studyParameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyParameter $studyParameter)
    {
        //
    }
}
