<?php

namespace App\Http\Controllers;

use App\Occurrence;
use Illuminate\Http\Request;
use App\Http\Resources\Occurrence as OccurenceResource;

class OccurrenceControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OccurenceResource::collection(Occurrence::paginate(10));
    }

    public function showOccurence($id)
    {
        return new OccurenceResource(Occurrence::where('idp',$id)->first());
       
    }
}
