<?php

namespace App\Http\Controllers;

use App\Variant;
use Illuminate\Http\Request;
use App\Http\Resources\Variant as VariantResource;

use Illuminate\Support\Facades\DB;


class VariantControllerAPI extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return VariantResource::collection(Variant::paginate(5));
    }

    public function showVariant($id)
    {
        return new VariantResource(Variant::where('variantID',$id)->first());
       
    }

    public function searchVariant(Request $request)
    {
        $s=$request->search;
        $s = strtolower($s);

        $result = DB::table('variants')->whereRaw('lower(name) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(variantSymbol) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(idp) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(geneIDs) like lower(?)', ["%{$s}%"])
                                    ->orWhereRaw('lower(geneSymbols) like lower(?)', ["%{$s}%"])
                                    ->paginate(5);

        return $result;
        

    }

}
