<?php

namespace App\Http\Controllers;

use App\ClinicalAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\ClinicalAnnotation as ClinicalAnnotationResource;
use Illuminate\Support\Facades\DB;


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

    public function showClinicalAnnotation(Request $request)
    {
        

      //  dd($request->gene);

      if($request->le ==null)
      {
          $request->le= '%';
      }
        
        
        

        $result = DB::table('clinical_ann_metadata')
                                    ->WhereRaw('lower(Gene) like lower(?)', ["%{$request->gene}%"])
                                    ->WhereRaw('lower(RelatedDiseases) like lower(?)', ["%{$request->phenotypes}%"])
                                    ->WhereRaw('lower(Location) like lower(?)', ["%{$request->variant}%"])
                                    ->WhereRaw('lower(LevelOfEvidence) like lower(?)', ["%{$request->le}%"])
                                    ->WhereRaw('lower(ClinicalAnnotationTypes) like lower(?)', ["%{$request->type}%"])
                                    ->get();

    
        return response()->json($result);
    }

   
}
