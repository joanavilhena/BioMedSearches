<?php

namespace App\Http\Controllers;

use App\VarGeneAnnotation;
use Illuminate\Http\Request;
use App\Http\Resources\VarGeneAnnotation as VarGeneAnnotationResource;
use Illuminate\Support\Facades\DB;


class VarGeneAnnotationControllerAPI extends Controller
{
  
    public function showGeneVariations(Request $request)
    {
      

        $result = DB::table('var_gene_ann')
                                    ->join('study_parameters', 'var_gene_ann.StudyParameters', '=', 'study_parameters.StudyParametersID')
                                    ->WhereRaw('lower(var_gene_ann.Phenotype) like lower(?)', ["%{$request->phenotype}%"])
                                    ->WhereRaw('lower(var_gene_ann.Chemical) like lower(?)', ["%{$request->chemicals}%"])
                                    ->WhereRaw('lower(var_gene_ann.Variant) like lower(?)', ["%{$request->variant}%"])
                                    ->get();


    
        return response()->json($result);
    }

}
