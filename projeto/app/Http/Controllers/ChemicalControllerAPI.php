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
        return ChemicalResource::collection(Chemical::paginate(5));
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

    public function countElem()
    {
        $num = DB::table('chemicals')->selectRaw('count(*) as num')->get();
        return $num;
    }

}
