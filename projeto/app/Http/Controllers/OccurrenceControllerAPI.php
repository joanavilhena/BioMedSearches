<?php

namespace App\Http\Controllers;

use App\Occurrence;
use Illuminate\Http\Request;
use App\Http\Resources\Occurrence as OccurenceResource;

class OccurrenceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OccurenceResource::collection(Occurrence::paginate(10));
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
     * @param  \App\Ocurrence  $ocurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Ocurrence $ocurrence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ocurrence  $ocurrence
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocurrence $ocurrence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ocurrence  $ocurrence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ocurrence $ocurrence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ocurrence  $ocurrence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocurrence $ocurrence)
    {
        //
    }
}
