<?php
 
namespace App\Traits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\project;
 
trait phptraits {
 
    public function authenticate($request)
	{
		$messages = [
		    'required' =>':attribute is required!',
		    'email'=>'Invalid Email Address',
		    'unique'=>'Duplicate :attribute',
		    'pin.size'=>'Invalid pin',
		];
		$validator = Validator::make($request->all(), [
			'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:projects,email,NULL,NULL,pin,' . $request['pin'],
            'pin' => 'required|size:6|unique:projects,pin,NULL,NULL,email,' . $request['email'],

		],$messages);
		return $validator;  	
	}
	public function dataStore($request)
	{
		project::create([
			'name'=> request('name'),
			'email'=>request('email'),
			'pin'=>request('pin')
		]);
		 try{
                Mail::to($request['email'])->send(new WelcomeMail());
                Log::info('EMAIL SENT !!');  
            }
            catch(\Exception $e)
            {
                log::info($e);
            } 
		   

	}
 
}