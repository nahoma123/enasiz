<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cup;


class CupController extends Controller
{
    //
    function showAllCups(){
    	$cups = Cup::all();
    	return $cups;
    }
    
}