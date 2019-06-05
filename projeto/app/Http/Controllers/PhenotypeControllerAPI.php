<?php

namespace App\Http\Controllers;

use App\Phenotype;
use App\ClinicalVariant;
use Illuminate\Http\Request;
use App\Http\Resources\Phenotype as PhenotypeResource;
use App\Http\Resources\ClinicalVariant as ClinicalVariantResource;

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

    
    public function showPhenotype($id)
    {
        return new PhenotypeResource(Phenotype::where('idp',$id)->first());
       
    }

    public function searchPhenotype(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('phenotypes')->whereRaw('lower(name) like lower(?)', ["%{$s}%"])
                                    ->paginate(5);

        return $result;
        
    }

    public function showClinicalVariants($id)
    {

         $result = DB::table('phenotypes')->whereRaw('lower(idp) like lower(?)', ["%{$id}%"])
                    ->first();

        $name = $result->name;

        $result = DB::table('clinicalvariants')->whereRaw('lower(phenotypes) like lower(?)', ["%{$name}%"])
        ->get();
        

        return response()->json($result);
       // return $result;
        
       
    }



   
}
