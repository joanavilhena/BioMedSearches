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

//Home Controller
Route::get('search', 'HomeControllerAPI@searchResults');

//Drugs
Route::get('drugs', 'DrugControllerAPI@index');
Route::get('drug/{id}','DrugControllerAPI@showDrug');
Route::get('drug/{id}/chemicals','DrugControllerAPI@getAssociatedChemicals');

Route::get('drugssearch','DrugControllerAPI@searchDrug');

//DrugLabels
Route::get('druglabels','DrugLabelControllerAPI@index');
Route::get('druglabel/{id}','DrugControllerAPI@showDrugLabel');

//Chemicals
Route::get('chemicals', 'ChemicalControllerAPI@index');
Route::get('chemical/{id}','ChemicalControllerAPI@showChemical');
Route::get('chemicalssearch','ChemicalControllerAPI@searchChemical');



//Genes
Route::get('genes','GeneControllerAPI@index');
Route::get('gene/{id}','GeneControllerAPI@showGene');
Route::get('genessearch','GeneControllerAPI@searchGene');


//Variants
Route::get('variants', 'VariantControllerAPI@index');
Route::get('variant/{id}','VariantControllerAPI@showVariant');
Route::get('variantssearch','VariantControllerAPI@searchVariant');

//Clinical Variants
Route::get('clinicalvariants', 'ClinicalVariantControllerAPI@index');


//Clinical Annotations
Route::get('clinicalannotations','ClinicalAnnotationControllerAPI@index');

//Occurences
Route::get('occurences','OccurrenceControllerAPI@index');
Route::get('occurence/{id}','OccurrenceControllerAPI@showOccurence');

//Phenotypes
Route::get('phenotypes','PhenotypeControllerAPI@index');


Route::get('relationships','RelationshipControllerAPI@index');
Route::get('studyparameters','StudyParameterControllerAPI@index');
Route::get('drugannotations','VarDrugAnnotationControllerAPI@index');
Route::get('pharmannotations','VarFaAnnotationControllerAPI@index');
Route::get('phenoannotations','VarPhenoAnnotationControllerAPI@index');
