<?php

namespace App\Http\Controllers;

use App\Variant;
use Illuminate\Http\Request;
use App\Http\Resources\Variant as VariantResource;

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

}
