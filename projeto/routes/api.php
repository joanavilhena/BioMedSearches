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
Route::get('news', 'HomeControllerAPI@getNews');
Route::get('searchnews', 'HomeControllerAPI@getNewsBySearch');


//Drugs
Route::get('drugs', 'DrugControllerAPI@index');
Route::get('drug/{id}','DrugControllerAPI@showDrug');
Route::get('drug/{id}/chemicals','DrugControllerAPI@getAssociatedChemicals');
Route::get('numDrugs','DrugControllerAPI@countElem');
Route::get('drugs/relatedDiseases', 'DrugControllerAPI@getRelatedDiseases');

Route::get('drugssearch','DrugControllerAPI@searchDrug');

//DrugLabels
Route::get('druglabels','DrugLabelControllerAPI@index');
Route::get('druglabel/{id}','DrugControllerAPI@showDrugLabel');

//Chemicals
Route::get('chemicals', 'ChemicalControllerAPI@index');
Route::get('chemical/{id}','ChemicalControllerAPI@showChemical');
Route::get('chemicalssearch','ChemicalControllerAPI@searchChemical');
Route::get('numChemicals','ChemicalControllerAPI@countElem');
Route::get('chemicals/relatedDiseases', 'ChemicalControllerAPI@getRelatedDiseases');
Route::get('chemicals/varphennoann', 'ChemicalControllerAPI@getVarPhenoAnn');
Route::get('chemicals/varfaann', 'ChemicalControllerAPI@getVarFaAnn');
Route::get('chemicals/vardrugann', 'ChemicalControllerAPI@getVarDrugAnn');
Route::get('chemicals/druglabels', 'ChemicalControllerAPI@getDrugLabels');
Route::get('chemicals/clinicalann', 'ChemicalControllerAPI@getClinicalANnotations');

//Variants
Route::get('variants', 'VariantControllerAPI@index');
Route::get('variant/{id}','VariantControllerAPI@showVariant');
Route::get('variantssearch','VariantControllerAPI@searchVariant');
Route::get('numVariants','VariantControllerAPI@countElem');
Route::get('getVariantID','VariantControllerAPI@getID');

//Clinical Variants
Route::get('clinicalvariants', 'ClinicalVariantControllerAPI@index');


//Clinical Annotations
Route::get('clinicalannotations','ClinicalAnnotationControllerAPI@index');

//Occurences
Route::get('occurences','OccurrenceControllerAPI@index');
Route::get('occurence/{id}','OccurrenceControllerAPI@showOccurence');

//Genes
Route::get('genes','GeneControllerAPI@index');
Route::get('gene/{id}','GeneControllerAPI@showGene');
Route::get('genessearch','GeneControllerAPI@searchGene');
Route::get('numGenes','GeneControllerAPI@countElem');
Route::get('getGeneID','GeneControllerAPI@getID');
Route::get('geneVariations','VarGeneAnnotationControllerAPI@showGeneVariations');
Route::get('gene/{id}/clinicalVariants','GeneControllerAPI@showClinicalVariantsGene');
Route::get('genes/relatedDiseases', 'GeneControllerAPI@getRelatedDiseases');
Route::get('genes/varphennoann', 'GeneControllerAPI@getVarPhenoAnn');
Route::get('genes/varfaann', 'GeneControllerAPI@getVarFaAnn');
Route::get('genes/vardrugann', 'GeneControllerAPI@getVarDrugAnn');
Route::get('genes/druglabels', 'GeneControllerAPI@getDrugLabels');
Route::get('genes/clinicalann', 'GeneControllerAPI@getClinicalANnotations');
Route::get('genes/variants', 'GeneControllerAPI@getVariants');

//FeedNews

//Phenotypes    
Route::get('phenotypes','PhenotypeControllerAPI@index');
Route::get('phenotypessearch','PhenotypeControllerAPI@searchPhenotype');
Route::get('phenotype/{id}','PhenotypeControllerAPI@showPhenotype');
Route::get('phenotype/{id}/clinicalVariants','PhenotypeControllerAPI@showClinicalVariants');
Route::get('phenotypes/PMIDs','PhenotypeControllerAPI@getPMIDs');
Route::get('phenoVariations','VarPhenoAnnotationControllerAPI@showPhenoVariations');
Route::get('getPhenoID','PhenotypeControllerAPI@getID');
//ClinicalAnnotation


Route::get('clinicalAnn','ClinicalAnnotationControllerAPI@showClinicalAnnotation');

Route::get('relationships','RelationshipControllerAPI@index');
Route::get('studyparameters','StudyParameterControllerAPI@index');
Route::get('drugannotations','VarDrugAnnotationControllerAPI@index');
Route::get('pharmannotations','VarFaAnnotationControllerAPI@index');
Route::get('phenoannotations','VarPhenoAnnotationControllerAPI@index');
Route::get('geneannotations','VarGeneAnnotationControllerAPI@index');
