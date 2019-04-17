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

    public function showDrugLabel($id)
    {
        return new DrugLabelResource(DrugLabel::where('idp',$id)->first());
       
    }

   
}
