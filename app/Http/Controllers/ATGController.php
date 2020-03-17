<?php

namespace App\Http\Controllers;
use App\project;

use Illuminate\Http\Request;

class ATGController extends Controller
{
    public function index(){
    	return view('/form');
    }

    public function store(Request $request){
    	$validatedData = $request->validate
    	([
			    'name' => 'required',
                 'email' => 'required|email:rfc,dns|unique:projects,email,NULL,NULL,pin,' . $request['pin'],
                'pin' => 'required|min:6|max:6|unique:projects,pin,NULL,NULL,email,' . $request['email'],
			    // 'email' => ['required','unique:projects','email:rfc,dns'],
			    // 'pin'=>['required','min:6','max:6'],
			]);

       // $mydata=project::get($request['email']);

    $data= new project();
     $data->name=$request['name'];
     // $data->email=request('email');
     $data->email=$request['email'];
     $data->pin=$request['pin'];
     $data->save();
    
     return view('/form',['success'=>'1']);

    
}
}

/*
!! LOcalhost Details!!
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tanya
DB_USERNAME=root
DB_PASSWORD=*/