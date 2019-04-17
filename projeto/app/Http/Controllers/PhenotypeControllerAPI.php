<?php

namespace App\Http\Controllers;

use App\Phenotype;
use Illuminate\Http\Request;
use App\Http\Resources\Phenotype as PhenotypeResource;


class PhenotypeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhenotypeResource::collection(Phenotype::paginate(5));
    }

   
}
