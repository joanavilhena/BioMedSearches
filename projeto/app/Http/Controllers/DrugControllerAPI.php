<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Drug as DrugResource;
use App\Http\Resources\Chemical as ChemicalResource;

use Illuminate\Support\Facades\DB;


use App\Drug;
use App\Chemical;


class DrugControllerAPI extends Controller
{
    public function index()
    {
        $result = DB::table('drugs')
        ->get();
        

        return response()->json($result);
    }

    public function showDrug($id)
    {
        return new DrugResource(Drug::where('idp',$id)->first());
       
    }

    public function getAssociatedChemicals($id)
    {
        return new ChemicalResource(Chemical::where('idp',$id)->paginate(5));
    }

    

    public function searchDrug(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('drugs')->whereRaw('lower(name) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(genericNames) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(idp) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(brandMixtures) like lower(?)', ["%{$s}%"])
                                    ->paginate(5);

        return $result;
        

    }


    public function countElem()
    {
        $num = DB::table('drugs')->selectRaw('count(*) as num')->get();
        return $num;
    }

    

  
}