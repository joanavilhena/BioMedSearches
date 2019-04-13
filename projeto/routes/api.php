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



Route::get('chemicals', 'ChemicalControllerAPI@index');
Route::get('clinicalvariants', 'ClinicalVariantControllerAPI@index');
Route::get('clinicalannotations','ClinicalAnnotationControllerAPI@index');
Route::get('druglabels','DrugLabelControllerAPI@index');
Route::get('genes','GeneControllerAPI@index');
Route::get('occurences','OccurrenceControllerAPI@index');
Route::get('phenotypes','PhenotypeControllerAPI@index');
Route::get('relationships','RelationshipControllerAPI@index');
Route::get('studyparameters','StudyParameterControllerAPI@index');
Route::get('drugannotations','VarDrugAnnotationControllerAPI@index');
Route::get('pharmannotations','VarFaAnnotationControllerAPI@index');
Route::get('phenoannotations','VarPhenoAnnotationControllerAPI@index');