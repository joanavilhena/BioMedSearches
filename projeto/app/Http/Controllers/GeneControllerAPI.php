<?php

namespace App\Http\Controllers;

use App\Gene;
use Illuminate\Http\Request;
use App\Http\Resources\Gene as GeneResource;


class GeneControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GeneResource::collection(Gene::paginate(5));

    }

    public function showGene($id)
    {
        return new GeneResource(Gene::where('idp',$id)->first());
       
    }

    
}
