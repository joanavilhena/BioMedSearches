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
use GuzzleHttp\Client;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class HomeControllerAPI extends Controller
{
   

    public function searchResults(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

    

        $chemicals = DB::table('chemicals')
        ->selectRaw('idp, name, \'Chemical\' as tableName');

        $genes = DB::table('genes')
        ->selectRaw('idp, name, \'Gene\' as tableName');

        $phenotypes = DB::table('phenotypes')
        ->selectRaw('idp, name, \'Phenotype\' as tableName');

            $page = 1;
            $paginate=5;
            $data = $genes->unionAll($chemicals)
                   // ->unionAll($genes) 
                   // ->unionAll($variants) 
                    ->unionAll($phenotypes) 
                    ->orderBy('name')
                    ->get(10);
                    //->paginate(10);
                

       return response()->json($data);
    }

    public function getNews()
    {
      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://newsapi.org/v2/everything?q=pharmacogenetics&apiKey=2792461d8d5145bd84197285c6b1d202',
        // You can set any number of default request options.
        'timeout' => 2.0,
      ]);

      $response = $client
        ->get('https://newsapi.org/v2/everything?q=pharmacogenetics&apiKey=2792461d8d5145bd84197285c6b1d202');

    /*$response = $client->request(
        'GET',
       
        
    );*/
    $devices = json_decode($response->getBody()->getContents());
    //dd($devices);
    return response()->json($devices);
    }

    public function getNewsBySearch(Request $request)
    {
      $s = $request->search;

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://newsapi.org/v2/everything?q='+$s+'&apiKey=2792461d8d5145bd84197285c6b1d202',
        // You can set any number of default request options.
        'timeout' => 2.0,
      ]);

    $response = $client->request(
        'GET',
       
        
    );
    $devices = json_decode($response->getBody()->getContents());
    //dd($devices);
    return response()->json($devices);
    }

}