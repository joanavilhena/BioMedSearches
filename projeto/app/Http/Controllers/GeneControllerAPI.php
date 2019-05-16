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
        return GeneResource::collection(Gene::paginate(5));

    }

    public function showGene($id)
    {
        return new GeneResource(Gene::where('idp',$id)->first());
       
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

    public function countElem()
    {
        $num = DB::table('genes')->selectRaw('count(*) as num')->get();
        return $num;
    }



    
}
