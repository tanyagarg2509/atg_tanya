<?php
 
namespace App\Traits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\project;
 
trait phptraits {
 
    public function authenticate($request)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:projects,email,NULL,NULL,pin,' . $request['pin'],
            'pin' => 'required|min:6|max:6|unique:projects,pin,NULL,NULL,email,' . $request['email'],

		]);
		return $validator;  	
	}
	public function dataStore($request)
	{
		
		Log::info('EMAIL SENT !!');   
		project::create([
			'name'=> request('name'),
			'email'=>request('email'),
			'pin'=>request('pin')
		]);   

	}
 
}