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
        return ClinicalAnnotationResource::collection(ClinicalAnnotation::paginate(5));
    }

   
}
