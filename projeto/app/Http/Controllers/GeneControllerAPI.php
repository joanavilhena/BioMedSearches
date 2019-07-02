<?php

namespace App\Http\Controllers;

use App\Gene;
use Illuminate\Http\Request;
use App\Http\Resources\Gene as GeneResource;
use Illuminate\Support\Facades\DB;


class GeneControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('genes')
        ->orderByRaw('name ASC')
        ->get();
        

        return response()->json($result);

    }

    public function showGene($id)
    {
        return new GeneResource(Gene::where('idp',$id)->first());
       
    }

    public function getVariants(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('variants')->whereRaw('lower(geneIDs) like lower(?)', ["{$s}"])->paginate(5);

       // dd($result->idp);
        //return $result;
        return response()->json($result);
    }

    public function getID(Request $request)
    {

        $s=$request->search;
        //dd($request);
        $s = strtolower($s);

        $result = DB::table('genes')->whereRaw('lower(symbol) like lower(?)', ["{$s}"])->paginate(1);

       // dd($result->idp);
        //return $result;
        return response()->json($result);
       
    }


    public function showClinicalVariantsGene($id)
    {

        $result = DB::table('genes')->whereRaw('lower(idp) like lower(?)', ["%{$id}%"])
                    ->first();

        $name = $result->name;

        $result = DB::table('clinicalvariants')->whereRaw('lower(genes) like lower(?)', ["%{$name}%"])
        ->get();
        

        return response()->json($result);
       // return $result;
        
       
    }



    public function searchGene(Request $request)
    {
        $s=$request->search;
        //dd($request);
        $s = strtolower($s);
        

        $result = DB::table('genes')->whereRaw('lower(name) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(alternateNames) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(idp) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(alternateNames) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(alternateSymbols) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(symbol) like lower(?)', ["%{$s}%"])
                                    ->paginate(5);

        return $result;
        

        
    }

    public function getRelatedDiseases(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('clinical_ann_metadata')->whereRaw('lower(Gene) like lower(?)', ["%{$s}%"])
                                                    ->whereRaw('lower(RelatedDiseases) not like lower(?)', ["NULL"])
                                                    ->distinct('RelatedDiseases')->paginate(5);

        return response()->json($result);

    }


    public function getVarDrugAnn(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('var_drug_ann')->whereRaw('lower(Gene) like lower(?)', ["%{$s}%"])->paginate(5);

        return response()->json($result);

    }

    public function getVarPhenoAnn(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('var_pheno_ann')->whereRaw('lower(Gene) like lower(?)', ["%{$s}%"])->paginate(5);

        return response()->json($result);

    }
    public function getVarFaAnn(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('var_fa_ann')->whereRaw('lower(Chemical) like lower(?)', ["%{$s}%"])->paginate(5);

        return response()->json($result);

    }


    

    public function countElem()
    {
        $num = DB::table('genes')->selectRaw('count(*) as num')->get();
        return $num;
    }



    
}
