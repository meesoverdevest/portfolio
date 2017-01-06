<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Year;

class YearController extends Controller
{
    public function index(){
    	$years = Year::all();
    	
    	return response()->json($years);
    }
}
