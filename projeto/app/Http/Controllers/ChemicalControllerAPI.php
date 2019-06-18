<?php

namespace App\Http\Controllers;

use App\Chemical;
use Illuminate\Http\Request;
use App\Http\Resources\Chemical as ChemicalResource;


use Illuminate\Support\Facades\DB;

class ChemicalControllerAPI extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $result = DB::table('chemicals')
        ->get();
        

        return response()->json($result);
    }

    public function showChemical($id)
    {
        return new ChemicalResource(Chemical::where('idp',$id)->first());
       
    }

    public function searchChemical(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('chemicals')->whereRaw('lower(name) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(genericNames) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(idp) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(brandMixtures) like lower(?)', ["%{$s}%"])
                                    ->paginate(5);

        return $result;
        

    }

    public function getRelatedDiseases(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('clinical_ann_metadata')->whereRaw('lower(RelatedChemicals) like lower(?)', ["%{$s}%"])->distinct('RelatedChemicals')->paginate(5);

        return response()->json($result);

    }

    public function getDrugLabels(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('druglabels')->whereRaw('lower(Name) like lower(?)', ["%{$s}%"])->paginate(5);

        return response()->json($result);

    }

    public function getVarDrugAnn(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('var_drug_ann')->whereRaw('lower(Chemical) like lower(?)', ["%{$s}%"])->paginate(5);

        return response()->json($result);

    }

    public function getVarPhenoAnn(Request $request)
    {
        
        $s=$request->search;
        $s = strtolower($s);
        $result = DB::table('var_pheno_ann')->whereRaw('lower(Chemical) like lower(?)', ["%{$s}%"])->paginate(5);

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
        $num = DB::table('chemicals')->selectRaw('count(*) as num')->get();
        return $num;
    }

}
