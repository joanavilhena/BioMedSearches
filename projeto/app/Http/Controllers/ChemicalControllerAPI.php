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
        return ChemicalResource::collection(Chemical::paginate(5));
    }

    public function showChemical($id)
    {
        return new ChemicalResource(Chemical::where('idp',$id)->first());
       
    }

}
