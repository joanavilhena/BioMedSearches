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
        $result = DB::table('phenotypes')
        ->get();
        return response()->json($result);
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

    public function getPMIDs(Request $request)
    {
        $gene = $request->gene;
        $disease = $request->disease;
        $variant = $request->location;
        $levelofevidence = $request->le;
        $type = $request->type;

        if($request->gene==null)
        {
            $gene = ' ';
        }

        if($request->disease==null)
        {
            $disease = ' ';
        }

        if($request->variant==null)
        {
            $variant = ' ';
        }
        if($request->le ==null)
        {
            $levelofevidence = ' ';
        }
            
    
        $gene = 'UGT1A1';
        $disease ='HIV';
        $variant ='rs887829';
        $levelofevidence ='1A';
        $type = 'Other';
        $result = DB::table('clinical_ann_metadata')->whereRaw('lower(Gene) like lower(?)', ["%{$gene}%"])
                                                    ->whereRaw('lower(RelatedDiseases) like lower(?)', ["%{$disease}%"])
                                                    ->whereRaw('lower(Location) like lower(?)', ["%{$variant}%"])
                                                    ->whereRaw('lower(LevelofEvidence) like lower(?)', ["%{$levelofevidence}%"])
                                                    ->whereRaw('lower(ClinicalAnnotationTypes) like lower(?)', ["%{$type}%"])
                    
                                                    ->get();
        

        return response()->json($result);
    }


    public function getID(Request $request)
    {

        $s=$request->search;
        //dd($request);
        $s = strtolower($s);

        //return $s;

        $result = DB::table('phenotypes')->whereRaw('lower(name) like lower(?)', ["{$s}"])->paginate(1);

       // dd($result->idp);
        //return $result;
        return response()->json($result);
       
    }

   
}
