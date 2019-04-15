<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Drug as DrugResource;
use App\Http\Resources\Chemical as ChemicalResource;
use \Carbon\Carbon ;

use App\Drug;
use App\Chemical;


class DrugControllerAPI extends Controller
{
    public function index()
    {
        return DrugResource::collection(Drug::paginate(5));
    }

    public function showDrug($id)
    {
        return new DrugResource(Drug::where('idp',$id)->first());
       
    }

    public function getAssociatedChemicals($id)
    {
        return new ChemicalResource(Chemical::where('idp',$id)->paginate(5));
    }

    

  
}