<?php

namespace App\Http\Controllers;

use App\DrugLabel;
use Illuminate\Http\Request;
use App\Http\Resources\DrugLabel as DrugLabelResource;

class DrugLabelControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return DrugLabelResource::collection(DrugLabel::paginate(10));
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
     * @param  \App\DrugLabel  $drugLabel
     * @return \Illuminate\Http\Response
     */
    public function show(DrugLabel $drugLabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrugLabel  $drugLabel
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugLabel $drugLabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrugLabel  $drugLabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugLabel $drugLabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrugLabel  $drugLabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugLabel $drugLabel)
    {
        //
    }
}
