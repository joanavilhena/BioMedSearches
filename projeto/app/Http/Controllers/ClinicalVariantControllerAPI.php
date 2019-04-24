<?php

namespace App\Http\Controllers;

use App\ClinicalVariant;
use Illuminate\Http\Request;
use App\Http\Resources\ClinicalVariant as ClinicalVariantResource;

class ClinicalVariantControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClinicalVariantResource::collection(ClinicalVariant::paginate(5));
    }

    
}
