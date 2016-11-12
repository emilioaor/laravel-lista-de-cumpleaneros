<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\employee;

class indexController extends Controller
{
    

    public function index(){

    	$employees = employee::where('status','SI')->orderBy('month','ASC')->orderBy('day','ASC')->get();
    	$employeesToday = employee::where('month',date('m'))->where('day',date('d'))->get();

    	return view('index/index')->with('employees',$employees)->with('employeesToday',$employeesToday);;
    }

    public function searchEmployee($name){

    	$employees = employee::where('name','LIKE',"%$name%")->get()->take(5);
   
    	return view('index/result')->with('employees',$employees);

    }

}
