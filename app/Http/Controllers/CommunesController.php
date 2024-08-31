<?php

namespace App\Http\Controllers;

use App\Models\communes;
use Illuminate\Http\Request;

class CommunesController extends Controller
{
    public function index(){

        $communes = communes::all()->where('status','A');

        return response()->json([

            'data' => $communes,
            'sucess'=>true
        ],200);

    }

}
