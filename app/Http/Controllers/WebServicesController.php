<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use Illuminate\Support\Facades\Validator;
use App\Traits\phptraits;

class WebServicesController extends Controller
{
    use phptraits;
    
    public function storeme(Request $request)
	{

		$validator=$this->authenticate($request);
		if ($validator->fails()) {
			return response()->json(["errors"=>$validator->errors(),"status"=>"fail|0"],422);	
		}
		else{
			$this->dataStore($request);
			return json_encode(['succes'=>true]);
		}
	}
}
