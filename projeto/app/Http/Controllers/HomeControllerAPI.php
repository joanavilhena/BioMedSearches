<?php

namespace App\Http\Controllers;

use App\Chemical;
use App\Drug;
use App\Gene;
use App\Variant;

use App\Http\Resources\Chemical as ChemicalResource;
use App\Http\Resources\Drug as DrugResource;
use App\Http\Resources\Gene as GeneResource;
use App\Http\Resources\Variant as VariantResource;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class HomeControllerAPI extends Controller
{
   

    public function searchResults(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

      //  $genes=DB::table('genes')->get();
       // $drugs = DB::table('drugs')->get();

        
    
  //      $result = $genes->toBase()->merge($drugs);
//        (object) $result = $result->paginate(5);
    
    //    $result = DB::table('genes')->from('drugs')->get(2);
          

                
    //$drugs = DB::table('drugs')
            //->select('idp','name')
      //      ->get();
        
        $drugs = DB::table('drugs')
               // ->select('idp','name');
                ->selectRaw('idp, name, \'drugs\' as tableName');
                

        $chemicals = DB::table('chemicals')
        ->selectRaw('idp, name, \'chemicals\' as tableName');

        $genes = DB::table('genes')
        ->selectRaw('idp, name, \'genes\' as tableName');

        $variants = DB::table('variants')
        ->selectRaw('idp, name, \'variants\' as tableName');

         
      
            
            $page = 1;
            $paginate=5;
            $data = $chemicals->unionAll($drugs)
                    ->unionAll($genes) 
                    ->unionAll($variants)  
                    ->orderBy('name')
                    ->get(20);
                    //->paginate(10);
                
                         
                    

         


       // return $data;
       return response()->json($data);
    }

}