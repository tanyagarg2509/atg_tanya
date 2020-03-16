<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index(){
    // 	return view('form');
    // }
    // public function store(){
    	
    // 	// //to access request
    // 	// dump(request()->all());

    // 	$data= new Project();
    // 	$data->name=request('name');
    // 	$data->email=request('email');
    // 	$data->pin=request('pin');
    // 	$data->save();

    //     return redirect('/form');

    // }
}
