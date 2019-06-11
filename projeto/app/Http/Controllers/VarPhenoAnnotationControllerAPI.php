<?php

namespace App\Http\Controllers;

use App\VarPhenoAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\VarPhenoAnnotation as VarPhenoAnnotationResource;
use Illuminate\Support\Facades\DB;


class VarPhenoAnnotationControllerAPI extends Controller
{
  
    public function showPhenoVariations(Request $request)
    {
      

        $result = DB::table('var_pheno_ann')
                                    ->join('study_parameters', 'var_pheno_ann.StudyParameters', '=', 'study_parameters.StudyParametersID')
                                    ->WhereRaw('lower(var_pheno_ann.Gene) like lower(?)', ["%{$request->gene}%"])
                                    ->WhereRaw('lower(var_pheno_ann.Chemical) like lower(?)', ["%{$request->chemicals}%"])
                                    ->WhereRaw('lower(var_pheno_ann.Variant) like lower(?)', ["%{$request->variant}%"])
                                    ->get();


    
        return response()->json($result);
    }

}
