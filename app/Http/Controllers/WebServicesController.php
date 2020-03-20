<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Traits\phptraits;

class WebServicesController extends Controller
{
    use phptraits;
    
    public function storeme(Request $request)
	{

		$validator=$this->authenticate($request);
		if ($validator->fails()) 
		{
			$errors=$validator->errors();
			$myerror=[];
			if ($errors->has('email')){
				$email_error=$errors->first('email');
				Log::info($email_error);
				array_push($myerror,'0 :'.$email_error);
				
			}
			if ($errors->has('name')){
				$name_error=$errors->first('name');
				Log::info($name_error);
				array_push($myerror,'1 :'.$name_error);
				
			}
			if ($errors->has('pin')){
				$pin_error=$errors->first('pin');
				Log::info($pin_error);
				array_push($myerror,'2 :'.$pin_error);
				
			}
			return response()->json(["errors"=>$myerror,"status"=>"fail|0"],422);	
			// return response()->json(["errors"=>,"status"=>"fail|0"],422);	
		}
		else{
			$this->dataStore($request);
			return json_encode(['status'=>"1",$request->all()]);
		}
	}
}
