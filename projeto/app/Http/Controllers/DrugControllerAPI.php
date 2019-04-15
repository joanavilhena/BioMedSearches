<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Drug as DrugResource;
use \Carbon\Carbon ;

use App\Drug;


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

  
}