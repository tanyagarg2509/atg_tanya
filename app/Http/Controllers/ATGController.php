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
            Log::info('Validation fails!!');  
            return redirect('/form')
                    ->withErrors($validator)
                    ->withInputs(); 

        }
        else{
            $this->dataStore($request);
            try{
                Mail::to('tanya@example.com')->send(new WelcomeMail());
            }
            catch(\Exception $e)
            {
                log::info($e);
            }
            // return new WelcomeMail();
            return view('/form',['success'=>'1']);
        }
    }

   
}
