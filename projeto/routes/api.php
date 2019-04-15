<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Drugs
Route::get('drugs', 'DrugControllerAPI@index');
Route::get('drug/{id}','DrugControllerAPI@showDrug');
Route::get('drug/{id}/chemicals','DrugControllerAPI@getAssociatedChemicals');

//DrugLabels
Route::get('druglabels','DrugLabelControllerAPI@index');

//Chemicals
Route::get('chemicals', 'ChemicalControllerAPI@index');
Route::get('chemical/{id}','ChemicalControllerAPI@showChemical');

//Genes
Route::get('genes','GeneControllerAPI@index');
Route::get('gene/{id}','GeneControllerAPI@showGene');


//Clinical Variants
Route::get('clinicalvariants', 'ClinicalVariantControllerAPI@index');


//Clinical Annotations
Route::get('clinicalannotations','ClinicalAnnotationControllerAPI@index');

//Occurences
Route::get('occurences','OccurrenceControllerAPI@index');

//Phenotypes
Route::get('phenotypes','PhenotypeControllerAPI@index');


Route::get('relationships','RelationshipControllerAPI@index');
Route::get('studyparameters','StudyParameterControllerAPI@index');
Route::get('drugannotations','VarDrugAnnotationControllerAPI@index');
Route::get('pharmannotations','VarFaAnnotationControllerAPI@index');
Route::get('phenoannotations','VarPhenoAnnotationControllerAPI@index');