<?php

namespace App\Http\Controllers;
use App\project;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Traits\phptraits;
class ATGController extends Controller
{
    use phptraits;
    public function index()
    {
    	return view('/form');
    }

    public function store(Request $request)
    {

        $validator=$this->authenticate($request);
        if ($validator->fails()) {
         
            
            return redirect('/form')
                    ->withErrors($validator->errors())
                    ->withInput();                    

        }
        else{
            $this->dataStore($request);
            return view('/form',['success'=>'1']);
        }
    }

   
}
