<?php

namespace App\Http\Controllers;

use App\Models\regions;
use Illuminate\Http\Request;

class RegionController extends Controller
{


    public function index(){

        $regions = regions::all()->where('status','A');

        return response()->json([

            'data' => $regions,
            'sucess'=>true
        ],200);

    }

}
