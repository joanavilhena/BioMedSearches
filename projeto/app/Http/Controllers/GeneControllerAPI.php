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
        $s = strtolower($s);
        
        $result = DB::table('genes')->where('name','like','%'.$s.'%')
                                    ->orWhere('alternateNames','like','%'.$s.'%' )
                                    ->orWhere('idp','%'.$s.'%')
                                    ->orWhere('alternateNames','like','%'.$s.'%')
                                    ->orWhere('alternateSymbols','like','%'.$s.'%')
                                    ->orWhere('symbol','like','%'.$s.'%')
                                    ->paginate(5);

       
      
        



        return $result;
        

    }



    
}
