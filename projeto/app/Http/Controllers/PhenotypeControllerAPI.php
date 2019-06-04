<?php

namespace App\Http\Controllers;

use App\Phenotype;
use Illuminate\Http\Request;
use App\Http\Resources\Phenotype as PhenotypeResource;

use Illuminate\Support\Facades\DB;


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

    public function searchPhenotype(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('phenotypes')
                                    ->paginate(2);

        return $result;
        

    }

   
}
